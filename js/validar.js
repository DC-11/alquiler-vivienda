const boton = document.querySelector("#boton");
let cedula = document.querySelector("#cdl");
let pass = document.querySelector("#pass");
let campoLLeno = false;
let campoLLeno2 = false;
const azulClaro = "#0095f6";
const azulBajo = "#b2dffc";

//-------validación email--------------//

cedula.addEventListener("input", () => {
  if (cedula.value != "") {
    campoLLeno = true;
  } else {
    campoLLeno = false;
  }
  if (campoLLeno2 == true && campoLLeno == true) {
    boton.removeAttribute("disabled");
    boton.style.background = azulClaro;
  } else {
    boton.style.background = azulBajo;
    boton.setAttribute("disabled", "");
  }
});

//-------validación contraseña--------------//

pass.addEventListener("input", () => {
  if (pass.value != "") {
    campoLLeno2 = true;
  } else {
    boton.setAttribute("disabled", "");
    campoLLeno2 = false;
  }
  if (campoLLeno2 == true && campoLLeno == true) {
    boton.removeAttribute("disabled");
    boton.style.background = azulClaro;
  } else {
    boton.style.background = azulBajo;
    boton.setAttribute("disabled", "");
  }
});
