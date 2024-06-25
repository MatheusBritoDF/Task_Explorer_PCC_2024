function valida() {
  if (grecaptcha.getResponse() == "") {
    alert("É necessário marcar a validação");
    return false;
  }
}
