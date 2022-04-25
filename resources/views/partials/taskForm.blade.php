<div class="flex-column taskForm center-content">
    <form method="post">
        @csrf
        <p class="flex-column">
            <label for="name" >Название задачи</label>
            <input type="text" id="name" name="task_name">
        </p>
        <p  class="flex-column">
            <label for="description">Описание задачи</label>
            <input type="text" id="description" name="task_description">
        </p>
        <p  class="flex-column">
            <label for="date">Запланированная дата</label>
            <input type="text" id="date" name="schedule_date">
        </p>
        <p class="center-content"><input type="submit" value="Создать задачу"></p>
    </form>
</div>
