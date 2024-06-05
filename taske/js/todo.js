const form = document.getElementById("todo-form");
const input = document.getElementById("todo-input");
const todoLane = document.getElementById("todo-lane");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  const value = input.value;

  if (!value) return;

  // Criar um objeto FormData para enviar os dados do formulário
  const formData = new FormData();
  formData.append('titulo', value);

  // Criar uma requisição AJAX
  const xhr = new XMLHttpRequest();

  // Configurar a função de retorno de chamada
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE) {
      if (xhr.status === 200) {
        // Se a requisição for bem-sucedida, você pode executar alguma ação, se necessário
        console.log(xhr.responseText);
      } else {
        // Lidar com erros, se houver
        console.error('Erro ao salvar a tarefa: ' + xhr.status);
      }
    }
  };

  // Abrir a conexão AJAX
  xhr.open("POST", "salvar_tarefas.php", true);

  // Enviar a requisição AJAX com os dados do formulário
  xhr.send(formData);

  
  // Código para adicionar a tarefa à interface do usuário
  const newTask = document.createElement("p");
  newTask.classList.add("task");
  newTask.setAttribute("draggable", "true");

  const taskText = document.createElement("span");
  taskText.innerText = value;
  newTask.appendChild(taskText);

  // Código para adicionar botões de editar e excluir
  // ...

  todoLane.appendChild(newTask);

  input.value = "";
});


