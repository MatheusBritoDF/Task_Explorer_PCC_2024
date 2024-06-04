

const form = document.getElementById("todo-form");
const input = document.getElementById("todo-input");
const todoLane = document.getElementById("todo-lane");

form.addEventListener("submit", (e) => {
    e.preventDefault();
    const value = input.value;

    if (!value) return;

    const newTask = document.createElement("p");
    newTask.classList.add("task");
    newTask.setAttribute("draggable", "true");

    const taskText = document.createElement("span"); // Criar um elemento <span>
    taskText.innerText = value;
    newTask.appendChild(taskText);

    const editar = document.createElement("button");
    editar.classList.add("editar");
    editar.innerText = "editar";
    editar.style.display = "none"; // Inicialmente, ocultar o botão

    // Adicionar evento de mouseover para mostrar o botão de editar
    newTask.addEventListener("mouseover", function() {
        editar.style.display = "block";
    });

    // Adicionar evento de mouseout para ocultar o botão de editar
    newTask.addEventListener("mouseout", function() {
        editar.style.display = "none";
    });

    // Adicionar evento de clique para tornar o texto editável quando o botão de editar for clicado
    editar.addEventListener("click", function() {
        taskText.contentEditable = true; // Tornar apenas o texto editável
        taskText.focus(); // Focar no texto para facilitar a edição
    });

        // Adicionar evento de clique para tornar o texto editável quando o botão de editar for clicado
        editar.addEventListener("click", function() {
            taskText.contentEditable = true; // Tornar apenas o texto editável
            // Focar no texto para facilitar a edição
    
            // Adicionar ouvinte de evento para desativar a edição quando clicar fora do elemento ou pressionar "Enter"
            const endEdit = function(event) {
                if ((event.type === "click" && !newTask.contains(event.target)) || (event.type === "keydown" && event.key === "Enter")) {
                    taskText.contentEditable = false;
                    document.removeEventListener("click", endEdit);
                    document.removeEventListener("keydown", endEdit);
                }
            };
    
            document.addEventListener("click", endEdit);
            document.addEventListener("keydown", endEdit);
        });

    const button = document.createElement("button");
    button.classList.add("excluir");
    button.innerText = "X";
    button.style.display = "none"; // Inicialmente, ocultar o botão

    // Adicionar evento de mouseover para mostrar o botão de exclusão
    newTask.addEventListener("mouseover", function() {
        button.style.display = "block";
    });

    // Adicionar evento de mouseout para ocultar o botão de exclusão
    newTask.addEventListener("mouseout", function() {
        button.style.display = "none";
    });

    // Adicionar evento de clique para excluir a tarefa
    button.addEventListener("click", function(){
        if(confirm("Deseja excluir esta tarefa?") === true){
        newTask.remove();
        }
    });

    newTask.appendChild(editar);
    newTask.appendChild(button);

    newTask.addEventListener("dragstart", () => {
        newTask.classList.add("is-dragging");
    });

    newTask.addEventListener("dragend", () => {
        newTask.classList.remove("is-dragging");
    });

    todoLane.appendChild(newTask);

    input.value = "";
});


