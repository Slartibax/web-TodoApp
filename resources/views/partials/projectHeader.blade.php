<div class="headerBlock">
    <div class="headerIcon center-content"><!--Icon-->
        <img class="round " src="" alt="icon">
    </div>
    <div class="headerTitle center-content"><!--Title-->
        {{$project->name}}
    </div>
    <div class="headerButton center-content"><!--Edit button-->
        <a class="round icon iconEdit headerEdit" title="Edit project this properties" id="{{$project->id}}-Edit" href="{{route('project.edit', ['project' => $project->id])}}"></a>
    </div>
    <div class="headerButton center-content"><!--Invite button-->
        <button class="round icon iconInvite headerInvite" title="Invite people in this project" id="{{$project->id}}-Invite"></button>
    </div>
    <div class="headerButton center-content">
        @can('delete',$project)
            <form class="headerButton center-content" action="{{route('project.destroy',['project' => $project->id])}}" method="post">
                @csrf
                @method('delete')
                <button id="delete" class="inputElement icon iconTrash round headerDelete" title="Delete this project" type="submit"></button>
            </form>
        @endcan
    </div>
</div>
