function increaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    if (value >= 10) {
        value = 10;
    }
    else {
        value++;
    }
    
    document.getElementById('number').value = value;
}
  
function decreaseValue() {
    var value = parseInt(document.getElementById('number').value, 10);
    value = isNaN(value) ? 1 : value;
    if (value <= 1) {
        value = 1;
    }
    else {
        value--;
    }
    document.getElementById('number').value = value;
}

function successMsg() {
    alert("Message sent succesfully!");
}

function successReg() {
    alert("Registration succesful!");
}

function successReset() {
    alert("Password reset link sent!");
}

function successProd() {
    alert("Product edited succesfully!");
}

function successProfile() {
    alert("Customer profile edited succesfully!");
}

function forApproval() {
    alert("Order submitted for approval!");
}

function showPassword() {
    var x = document.getElementById("psw");
    var y = document.getElementById("psw-repeat");
    if (x.type === "password") {
      x.type = "text";
      y.type = "text";
    } else {
      x.type = "password";
      y.type = "password";
    }
  } 

function addToCart() {
    alert("Item added to cart!");
}

function updatePrices2() {
    var table = document.getElementById("cart");
    var price, qt;
    for (var i = 0, cell; cell = table.cells[i]; i++) {
        if(cell.id = "pricedata") {
            price = document.getElementById("pricedata").value;
        }
        if(cell.id = "qtdata") {
            qt = document.getElementById("qtdata").value;
        }
        if(cell.id= "subtotaldata") {
        document.getElementById("subtotaldata").innerHTML = '<span style="float:right;">$price*qt</span>';
    }
   }
}

function updatePrices() {
    if (document.body.contains(document.getElementById('quantity1'))) {
        var q1 = document.getElementById('quantity1').value;
    }
    else {
        var q1 = 0;
    }

    if (document.body.contains(document.getElementById('quantity2'))) {
        var q2 = document.getElementById("quantity2").value;
    }
    else {
        var q2 = 0;
    }
    var p1 = document.getElementById("price1").value;
    var p2 = document.getElementById("price1").value;
    var subtotal1 = q1*p1;
    var subtotal2 = q2*p2;
    var subtotal = subtotal1 + subtotal2;
    var gst = Number((subtotal * 0.05).toFixed(2));
    var pst = Number((subtotal * 0.09975).toFixed(2));
    var grandtotal = Number((subtotal + gst + pst).toFixed(2));

    if (document.body.contains(document.getElementById('subtotal1'))) {
        document.getElementById("subtotal1").innerHTML = "$" + subtotal1;
    }

    if (document.body.contains(document.getElementById('subtotal2'))) {
        document.getElementById("subtotal2").innerHTML = "$" + subtotal2;
    }

    document.getElementById("subtotal").innerHTML = "$" + subtotal;
    document.getElementById("gst").innerHTML = "$" + gst;
    document.getElementById("pst").innerHTML = "$" + pst;
    document.getElementById("grandtotal").innerHTML = "$" + grandtotal;
}

function checkPW() {
    if (document.getElementById('psw').value ==
    document.getElementById('psw-repeat').value) {
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'Passwords match';
  } else {
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'Passwords do not match';
  }
}


/*
function updater() {
    var table = document.getElementById("cart");
    var subtotal1, subtotal2;
    for (var i = 0, row; row = table.rows[i]; i++) {
        for (var j = 2, col; col = row.cells[j]; j++) {
            row.cells[j].
        }
    }
}
*/
function removeRow(x) {
    var p = x.parentNode.parentNode;
    p.parentNode.removeChild(p);
}