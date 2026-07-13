function editTask(btn) {
    const li = btn.closest('li');
    const span = li.querySelector('span');
    const taskInput = document.getElementById('task-input');
    const taskId = li.dataset.id;

    taskInput.value = span.textContent;
    taskInput.focus();

    const form = document.getElementById('add-form');
    form.onsubmit = function(e) {
        e.preventDefault();
        const newText = taskInput.value.trim();
        if (!newText) return;

        const hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = 'task_id';
        hidden.value = taskId;
        form.appendChild(hidden);

        const editFlag = document.createElement('input');
        editFlag.type = 'hidden';
        editFlag.name = 'edit_task';
        editFlag.value = '1';
        form.appendChild(editFlag);

        form.querySelector('input[name="task"]').value = newText;
        form.submit();
    };
}

function syncToLocalStorage() {
    const items = document.querySelectorAll('#task-list li');
    const tasks = [];
    items.forEach(item => {
        tasks.push({
            task: item.dataset.task,
            done: item.classList.contains('completed')
        });
    });
    localStorage.setItem('todo_tasks', JSON.stringify(tasks));
}

syncToLocalStorage();
