    <div class="navigation"><!--Плашка навигации, будет заполнена временными ссылками, поскольку навигация должна быть генерируемой-->
        <div class="foldPanelButtonBlock">
            <input class="foldLeftPanelButton icon iconHamburgerMenu round" type="button" id="navigationFold">
        </div>

        <div class="userBlock round navigationBlockShader"> <!-- Блок акаунта -->
            <div class="profileNameAndImageBlock">
                <div class="profileImage"><img src="" alt="error"></div>
                <div class="profileName">{{$user['name']}}</div>
            </div><!--Изображение и ник-->
                <div class="profileButtonsBlock"><!--Справка и настройки-->
                    <form class="center-content" method="post" action="/logout">
                        @csrf
                        <button class="profileButton icon iconSettings round" type="submit" id="settings"></button>
                    </form><!--Настройки-->
                    <div class="center-content"><input class="profileButton icon iconProperties round" type="button" id="about"></div><!--Справка-->
                </div><!--Справка и настройки-->
        </div>
        <div class="navigationListBlock round navigationBlockShader"><!-- Навигация -->
            <div><!--Личные проекты-->
                <div class="navigationFold">
                    <a href="">Личные проекты</a>
                </div>
                <div class="navigationItem">
                    @each('partials.navigationElement', $projects['personal'], 'navigationElement')
                </div>
            </div>
            <div><!--Общие проекты-->
               <div class="navigationFold">
                   <a href="">Общие проекты</a>
               </div>
                <div class="navigationItem">
                    @each('partials.navigationElement', $projects['shared'], 'navigationElement')
                </div>
            </div>
            <div class="navigationItem center-content">
{{--                <label id="createProject" for="modal-2" class="icon iconAddTask createTaskButton"></label>--}}
                <label id="createProject" for="project.create" class="icon iconAddTask createProjectButton">
                    <a id="project.create" href="{{route('project.create')}}" class="createProjectButton"></a>
                </label>
            </div>
        </div>
    </div>
