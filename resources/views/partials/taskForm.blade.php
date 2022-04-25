<div class="flex-column taskForm center-content">
    <div class="flex-column">
        <h2>Создать новый проект</h2>
    </div>
    <form method="post">
        @csrf
        <p class="flex-column">
            <input type="text" id="name" placeholder="Название задачи" name="task_name">
        </p>
        <p  class="flex-column">
            <input type="text" id="description" placeholder="Описание задачи" name="task_description">
        </p>
        <p  class="flex-column">
            <input type="text" id="date" placeholder="Дата" name="schedule_date">
        </p>
        <p class="center-content"><input type="submit" value="Создать задачу"></p>
    </form>
</div>
