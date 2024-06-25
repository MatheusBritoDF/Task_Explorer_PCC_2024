
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
                const response = JSON.parse(xhr.responseText);
                console.log(response.message);

                // Código para adicionar a tarefa à interface do usuário
                const newTask = document.createElement("p");
                newTask.classList.add("task");
                newTask.setAttribute("draggable", "true");
                newTask.setAttribute("data-id-cartao", response.id_cartao);

                const taskText = document.createElement("span");
                taskText.innerText = value;
                newTask.appendChild(taskText);

                // Adicionar eventos de drag and drop à nova tarefa
                newTask.addEventListener("dragstart", () => {
                    newTask.classList.add("is-dragging");
                });
                newTask.addEventListener("dragend", () => {
                    newTask.classList.remove("is-dragging");

                    // Obter a nova lista após arrastar
                    const newList = newTask.closest(".swim-lane");
                    const newListId = newList.getAttribute("data-id-lista");
                    const taskId = newTask.getAttribute("data-id-cartao");

                    // Enviar uma requisição AJAX para atualizar o id_lista no banco de dados
                    const xhr = new XMLHttpRequest();
                    xhr.open("POST", "atualizar_tarefas.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.onreadystatechange = function() {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status === 200) {
                                console.log("ID da lista atualizado com sucesso!");
                            } else {
                                console.error("Erro ao atualizar o ID da lista: " + xhr.status);
                            }
                        }
                    };
                    xhr.send(`id_cartao=${taskId}&id_lista=${newListId}`);
                });

                todoLane.appendChild(newTask);
                input.value = "";
            } else {
                console.error('Erro ao salvar a tarefa: ' + xhr.status);
            }
        }
    };

    // Abrir a conexão AJAX
    xhr.open("POST", "tarefa-save.php", true);

    // Enviar a requisição AJAX com os dados do formulário
    xhr.send(formData);
});


