
var data = "";
function getDestination(item) {
  if (item == "") {
    document.getElementById("passenger_id").disabled = true;
    return;
  }
  document.getElementById("passenger_id").disabled = false;
  data = JSON.parse(item);
  document.getElementById("destination_id").value = data.id;
  const passenger_id = document.getElementById("passenger_id");
  if (passenger_id.value != "") {
    getCostTour(passenger_id.value);
  }
}

function getCostTour(id) {
  if (id == "") {
    document.getElementById("amount").disabled = true;
    document.getElementById('cost_ticket').value = "Rp. 0";
    document.getElementById('total_cost_ticket').value = "Rp. 0";
    return;
  }
  let cost = data.cost_tour;
  let costTour = cost.find(x => x.passenger_id == id);
  document.getElementById("cost_ticket").value = "Rp. " + convertToRp(costTour.price);
  document.getElementById("total_cost_ticket").value = "Rp. " + convertToRp(costTour.price);
  document.getElementById("amount").disabled = false;
  document.getElementById("amount").value = 1;
  document.getElementById('add-cart').disabled = false;
}

function getTotalCostTicket(item) {
  let cost = data.cost_tour;
  let amount = convertToNominal(item);
  let costTour = cost.find(x => x.passenger_id == document.getElementById("passenger_id").value);
  document.getElementById("total_cost_ticket").value = "Rp. " + convertToRp(costTour.price * amount);
  if (amount <= 0) {
    document.getElementById('amount').value = 1;
  }
  document.getElementById('amount').value = convertToRp(amount);
}


var html = '';
var no = 1;
var totalPrice = 0;

var dataCart = [];
function addToCart() {
  if (!data) {
    Swal.fire({
      icon: 'error',
      title: 'Oops...',
      text: 'Pilih Pariwisata terlebih dahulu!',
    });
    return;
  }
  let cost = data.cost_tour;
  let costTour = cost.find(x => x.passenger_id == document.getElementById("passenger_id").value);
  let total = costTour.price * convertToNominal(document.getElementById("amount").value);
  totalPrice += total;
  document.getElementById("total-price").innerHTML = `Rp. ${convertToRp(totalPrice)}`;


  // if data already exist in cart then update the data
  let dataExist = dataCart.find(x => x == costTour.id);
  if (dataExist) {
    let amount = convertToNominal(document.getElementById("amount-" + costTour.id).innerHTML);
    let newAmount = parseInt(amount) + parseInt(convertToNominal(document.getElementById("amount").value));
    let newTotal = costTour.price * newAmount;
    document.getElementById("amount-" + costTour.id).innerHTML = newAmount;
    document.getElementById("total-" + costTour.id).innerHTML = `Rp. ${convertToRp(newTotal)}`;

    return;
  }


  html = `
    <tr>
      <td class="text-center"> ${no} </td>
      <td>
        <span>${data.title}</span>
        <input type="hidden" name="destination_id[]" value="${costTour.id}">
      </td>
      <td>
        <span class="badge bg-success" style="font-size: 11px">${data.type_tour.name}</span>
      </td>
      <td>
        <span>${costTour.passenger.name}</span>
        <input type="hidden" name="passenger_id[]" value="${costTour.passenger.id}">  
      </td>
      <td class="text-center">
        <span id="amount-${costTour.id}">${document.getElementById("amount").value}</span>
        <input type="hidden" name="amount[]" value="${document.getElementById("amount").value}">  
      </td>
      <td>
        <span id="total-${costTour.id}">Rp. ${convertToRp(total)}</span>
        <input type="hidden" name="total[]" value="${total}">
      </td>
      <td class="text-center">
        <button type="button" class="btn btn-outline-danger btn-sm" onclick="deleteRow(this)">
          <i class="ti ti-trash"></i>
        </button>
      </td>
    </tr>
    `;
  no++;
  document.getElementById("table").innerHTML += html;
  dataCart.push(costTour.id);
  clearForm();
}

function clearForm() {
  document.getElementById("passenger_id").value = "";
  document.getElementById("destination_id").value = "";
  document.getElementById("destination").value = "";
  document.getElementById("amount").value = "";
  document.getElementById("cost_ticket").value = "";
  document.getElementById("total_cost_ticket").value = "";
  document.getElementById("amount").disabled = true;
  document.getElementById('add-cart').disabled = true;
}

function deleteRow(item) {
  let row = item.parentNode.parentNode;
  console.log(row);
  let total = convertToNominal(row.cells[5].children[1].value);
  totalPrice -= total;
  document.getElementById("total-price").innerHTML = `Rp. ${convertToRp(totalPrice)}`;
  row.parentNode.removeChild(row);
  no--;
}

function convertToRp(value) {
  let val = value.toString().split("").reverse().join("");
  let valSplit = val.match(/\d{1,3}/g);
  let result = valSplit.join(".").split("").reverse().join("");
  return result;
}

function convertToNominal(value) {
  let val = value.split(".").join("");
  return val;
}