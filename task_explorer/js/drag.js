document.addEventListener("DOMContentLoaded", () => {
  const draggables = document.querySelectorAll(".task");
  const droppables = document.querySelectorAll(".swim-lane");

  draggables.forEach((task) => {
      task.addEventListener("dragstart", () => {
          task.classList.add("is-dragging");
      });
      task.addEventListener("dragend", () => {
          task.classList.remove("is-dragging");

          // Obter a nova lista após arrastar
          const newList = task.closest(".swim-lane");
          const newListId = newList.getAttribute("data-id-lista");
          const taskId = task.getAttribute("data-id-cartao");

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
  });

  droppables.forEach((zone) => {
      zone.addEventListener("dragover", (e) => {
          e.preventDefault();

          const bottomTask = insertAboveTask(zone, e.clientY);
          const curTask = document.querySelector(".is-dragging");

          if (!bottomTask) {
              zone.appendChild(curTask);
          } else {
              zone.insertBefore(curTask, bottomTask);
          }
      });
  });

  const insertAboveTask = (zone, mouseY) => {
      const els = zone.querySelectorAll(".task:not(.is-dragging)");

      let closestTask = null;
      let closestOffset = Number.NEGATIVE_INFINITY;

      els.forEach((task) => {
          const { top } = task.getBoundingClientRect();

          const offset = mouseY - top;

          if (offset < 0 && offset > closestOffset) {
              closestOffset = offset;
              closestTask = task;
          }
      });

      return closestTask;
  };
});
