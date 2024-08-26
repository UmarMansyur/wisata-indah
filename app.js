const express = require('express');
const cors = require('cors');

const app = express();
app.use(cors());
app.use(express.json());

function haversine(lat1, lon1, lat2, lon2) {
    const R = 6371; // Radius of the Earth in kilometers
    const dlat = toRadians(lat2 - lat1);
    const dlon = toRadians(lon2 - lon1);
    const a = Math.sin(dlat / 2) ** 2 +
              Math.cos(toRadians(lat1)) * Math.cos(toRadians(lat2)) * Math.sin(dlon / 2) ** 2;
    const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1 - a));
    return R * c;
}

function toRadians(degrees) {
    return degrees * (Math.PI / 180);
}

function floydWarshall(distanceMatrix) {
    const n = distanceMatrix.length;
    const dist = distanceMatrix.map(row => [...row]); // deep copy
    for (let k = 0; k < n; k++) {
        for (let i = 0; i < n; i++) {
            for (let j = 0; j < n; j++) {
                if (dist[i][j] > dist[i][k] + dist[k][j]) {
                    dist[i][j] = dist[i][k] + dist[k][j];
                }
            }
        }
    }
    return dist;
}

function selectNextNode(currentNode, visitedNodes, n, pheromone, distFw, alpha, beta) {
    const probabilities = [];
    for (let i = 0; i < n; i++) {
        if (!visitedNodes.has(i)) {
            const pheromoneLevel = Math.pow(pheromone[currentNode][i], alpha);
            const distance = Math.pow(1 / (distFw[currentNode][i] + 1e-10), beta);
            probabilities.push(pheromoneLevel * distance);
        } else {
            probabilities.push(0);
        }
    }
    const total = probabilities.reduce((a, b) => a + b, 0);

    if (total === 0) {
        const unvisited = Array.from({ length: n }, (_, i) => i).filter(i => !visitedNodes.has(i));
        return unvisited[Math.floor(Math.random() * unvisited.length)];
    }

    const normalizedProbabilities = probabilities.map(p => p / total);
    return weightedRandomChoice(normalizedProbabilities);
}

function weightedRandomChoice(probabilities) {
    let sum = 0;
    const r = Math.random();
    for (let i = 0; i < probabilities.length; i++) {
        sum += probabilities[i];
        if (r <= sum) return i;
    }
}

function antColonyOptimization(distFw, pheromone, n, alpha = 1, beta = 2, rho = 0.5, Q = 100) {
    let bestPath = null;
    let bestLength = Infinity;

    for (let _ = 0; _ < 100; _++) {
        for (let _ = 0; _ < 10; _++) {
            const path = [0];
            const visited = new Set(path);
            for (let _ = 0; _ < n - 1; _++) {
                const nextNode = selectNextNode(path[path.length - 1], visited, n, pheromone, distFw, alpha, beta);
                path.push(nextNode);
                visited.add(nextNode);
            }
            const pathLength = path.slice(0, -1).reduce((sum, node, i) => sum + distFw[node][path[i + 1]], 0);
            if (pathLength < bestLength) {
                bestLength = pathLength;
                bestPath = path;
            }
        }
        for (let i = 0; i < pheromone.length; i++) {
            for (let j = 0; j < pheromone[i].length; j++) {
                pheromone[i][j] *= (1 - rho);
            }
        }
        for (let i = 0; i < bestPath.length - 1; i++) {
            pheromone[bestPath[i]][bestPath[i + 1]] += Q / bestLength;
        }
    }

    let total_jarak = 0;
    total_jarak = bestPath.slice(0, -1).reduce((sum, node, i) => sum + distFw[node][bestPath[i + 1]], 0);

    // hitung jarak antar node
    let jarak = [];
    for (let i = 0; i < bestPath.length - 1; i++) {
        jarak.push(distFw[bestPath[i]][bestPath[i + 1]]);
    }



    return { bestPath, bestLength, total_jarak, jarak };
}

app.post('/optimize', (req, res) => {
    try {
        const latLongs = req.body.locations;
        const latitudes = latLongs.map(loc => loc.lat);
        const longitudes = latLongs.map(loc => loc.lon);

        const numLocations = latitudes.length;
        const distanceMatrix = Array.from({ length: numLocations }, () => Array(numLocations).fill(0));
        for (let i = 0; i < numLocations; i++) {
            for (let j = 0; j < numLocations; j++) {
                if (i !== j) {
                    distanceMatrix[i][j] = haversine(latitudes[i], longitudes[i], latitudes[j], longitudes[j]);
                }
            }
        }

        const distFw = floydWarshall(distanceMatrix);
        let pheromone = Array.from({ length: numLocations }, () => Array(numLocations).fill(1 / numLocations));
        const { bestPath, bestLength, total_jarak, jarak } = antColonyOptimization(distFw, pheromone, numLocations);


        res.json({ best_path: bestPath, best_length: bestLength , total_jarak: total_jarak.toFixed(2), jarak: jarak.map(j => j.toFixed(2)) });
    } catch (e) {
        res.status(400).json({ error: e.message });
    }
});

app.listen(3000, () => {
    console.log('Server is running on port 3000');
});
