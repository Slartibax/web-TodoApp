<div class="flex-column taskForm center-content projectForm">
    <div class="flex-column">
        <h2>Создать новый проект</h2>
    </div>
    <form method="post">
        @csrf
        <p class="flex-column">
            <input type="text" id="name" placeholder="Название проекта" name="project_name">
        </p>
        <p class="center-content"><input type="submit" value="Создать проект"></p>
    </form>
</div>
