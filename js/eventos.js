let datos = document.querySelectorAll(".ipt");
for (let i = 0; i < datos.length; i++) {
  datos[i].addEventListener("blur", () => {
    if (datos[i].value != "") {
      datos[i].classList.add("has-val");
    } else {
      datos[i].classList.remove("has-val");
    }
  });
}

// -------------------------CAMPOS NUMERICOS-------------
let numero = "";
let camposNumericos = document.querySelectorAll(".numero");
for (let i = 0; i < camposNumericos.length; i++) {
  camposNumericos[i].addEventListener("input", (e) => {
    if (isNaN(camposNumericos[i].value) || e.data == " ") {
      camposNumericos[i].value = numero + "";
    } else {
      numero = camposNumericos[i].value;
    }
  });
  camposNumericos[i].addEventListener("blur", (e) => {
    numero = "";
  });
}
// -------------------------NO INGRESAR NUMEROS AL COMMIENZO-------------
let campostexto = document.querySelectorAll(".texto");
for (let i = 0; i < campostexto.length; i++) {
  campostexto[i].addEventListener("input", (e) => {
    if (isNaN(campostexto[i].value)) {
      campostexto[i].value;
    } else {
      campostexto[i].value = "";
    }
  });
}
