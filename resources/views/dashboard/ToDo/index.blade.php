@extends('dashboard.layout.main_master')

@push('dashboard_style')
    <!--  BEGIN CUSTOM STYLE FILE  -->
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/plugins/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('dashboard') }}/assets/css/forms/theme-checkbox-radio.css">
    <link href="{{ asset('dashboard') }}/assets/css/apps/todolist.css" rel="stylesheet" type="text/css" />
    <!--  END CUSTOM STYLE FILE  -->
@endpush

@include('dashboard.inc.dashboard_breadcrumb', [
'name' => 'Dashboard',
'route_name' => 'home',
'section_name' => 'Todo List'
])

@section('dashboard_content')
    <div class="layout-px-spacing">

        <div class="row layout-top-spacing">
            <div class="col-xl-12 col-lg-12 col-md-12">

                <div class="mail-box-container">
                    <div class="mail-overlay"></div>

                    <div class="tab-title">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-12 text-center">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-clipboard">
                                    <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2">
                                    </path>
                                    <rect x="8" y="2" width="8" height="4" rx="1" ry="1"></rect>
                                </svg>
                                <h5 class="app-title">Todo List</h5>
                            </div>

                            <div class="todoList-sidebar-scroll ps">
                                <div class="col-md-12 col-sm-12 col-12 mt-4 pl-0">
                                    <ul class="nav nav-pills d-block" id="pills-tab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link list-actions active" id="all-list" data-toggle="pill"
                                                href="#pills-inbox" role="tab" aria-selected="true"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-list">
                                                    <line x1="8" y1="6" x2="21" y2="6"></line>
                                                    <line x1="8" y1="12" x2="21" y2="12"></line>
                                                    <line x1="8" y1="18" x2="21" y2="18"></line>
                                                    <line x1="3" y1="6" x2="3" y2="6"></line>
                                                    <line x1="3" y1="12" x2="3" y2="12"></line>
                                                    <line x1="3" y1="18" x2="3" y2="18"></line>
                                                </svg> Inbox <span class="todo-badge badge">9</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-done" data-toggle="pill"
                                                href="#pills-sentmail" role="tab" aria-selected="false"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-thumbs-up">
                                                    <path
                                                        d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                                                    </path>
                                                </svg> Done <span class="todo-badge badge">2</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-important" data-toggle="pill"
                                                href="#pills-important" role="tab" aria-selected="false"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-star">
                                                    <polygon
                                                        points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2">
                                                    </polygon>
                                                </svg> Important <span class="todo-badge badge">3</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link list-actions" id="todo-task-trash" data-toggle="pill"
                                                href="#pills-trash" role="tab" aria-selected="false"><svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash-2">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                    <line x1="10" y1="11" x2="10" y2="17"></line>
                                                    <line x1="14" y1="11" x2="14" y2="17"></line>
                                                </svg> Trash</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div>
                                </div>
                            </div>

                            <a class="btn" id="addTask" href="#"><svg xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                    class="feather feather-plus">
                                    <line x1="12" y1="5" x2="12" y2="19"></line>
                                    <line x1="5" y1="12" x2="19" y2="12"></line>
                                </svg> New Task</a>
                        </div>
                    </div>

                    <div id="todo-inbox" class="accordion todo-inbox">
                        <div class="search">
                            <input type="text" class="form-control input-search" placeholder="Search Here...">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-menu mail-menu d-lg-none">
                                <line x1="3" y1="12" x2="21" y2="12"></line>
                                <line x1="3" y1="6" x2="21" y2="6"></line>
                                <line x1="3" y1="18" x2="21" y2="18"></line>
                            </svg>
                        </div>

                        <div class="todo-box">

                            <div id="ct" class="todo-box-scroll ps ps--active-y">
                                @foreach ($todos as $task)
                                <div class="todo-item all-list">
                                    <div class="todo-item-inner">
                                        <div class="n-chk text-center">
                                            <label class="new-control new-checkbox checkbox-primary">
                                                <input type="checkbox" class="new-control-input inbox-chkbox">
                                                <span class="new-control-indicator"></span>
                                            </label>
                                        </div>

                                        <div class="todo-content">
                                            <h5 class="todo-heading" data-todoheading="{{ $task->task_title }}">
                                                {{ $task->task_title }}</h5>
                                            <p class="meta-date">{{ $task->created_at->diffForHumans() }}</p>
                                            <p class="todo-text"
                                                data-todohtml="{{ $task->task_description }}"
                                                data-todotext="{{ $task->task_description }}">
                                                {{ $task->task_description }}</p>
                                        </div>

                                        <div class="priority-dropdown custom-dropdown-icon">
                                            <div class="dropdown p-dropdown">
                                                <a class="dropdown-toggle
                                                @if ($task->task_priority == 'high')
                                                    danger
                                                    @elseif ($task->task_priority == 'medium')
                                                    warning
                                                    @else
                                                    primary
                                                @endif
                                                " href="#" role="button"
                                                    id="dropdownMenuLink-1" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-alert-octagon">
                                                        <polygon
                                                            points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                        </polygon>
                                                        <line x1="12" y1="8" x2="12" y2="12"></line>
                                                        <line x1="12" y1="16" x2="12" y2="16"></line>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-1">

                                                    <a class="dropdown-item
                                                    @if ($task->task_priority == 'high')
                                                    danger
                                                    @elseif ($task->task_priority == 'medium')
                                                    warning
                                                    @else
                                                    primary
                                                    @endif
                                                    " href="javascript:void(0);"><svg
                                                            xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-alert-octagon">
                                                            <polygon
                                                                points="7.86 2 16.14 2 22 7.86 22 16.14 16.14 22 7.86 22 2 16.14 2 7.86 7.86 2">
                                                            </polygon>
                                                            <line x1="12" y1="8" x2="12" y2="12"></line>
                                                            <line x1="12" y1="16" x2="12" y2="16"></line>
                                                        </svg> {{ $task->task_priority }}
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="action-dropdown custom-dropdown-icon">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink-2"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-more-vertical">
                                                        <circle cx="12" cy="12" r="1"></circle>
                                                        <circle cx="12" cy="5" r="1"></circle>
                                                        <circle cx="12" cy="19" r="1"></circle>
                                                    </svg>
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink-2">
                                                    <a class="edit dropdown-item" href="{{ route('todos.edit', $task) }}">Edit</a>
                                                    <a class="important dropdown-item"
                                                        href="">Important
                                                    </a>
                                                    <a class="dropdown-item delete" href=""
                                                    onclick="event.preventDefault()
                                                    document.getElementById('task-delete-form-{{ $task->id }}').submit();">Delete</a>

                                                    <a class="dropdown-item permanent-delete" href=""
                                                    onclick="event.preventDefault()
                                                    document.getElementById('task-delete-form-{{ $task->id }}').submit();">Permanent Delete</a>

                                                    <form id="task-delete-form-{{ $task->id }}" action="{{ route('todos.destroy', $task) }}" method="POST" class="d-none">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>

                                                    <a class="dropdown-item revive" href="javascript:void(0);">Revive
                                                        Task</a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                @endforeach

                                <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                    <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
                                </div>
                                <div class="ps__rail-y" style="top: 0px; height: 498px; right: 0px;">
                                    <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 259px;"></div>
                                </div>
                            </div>

                            <div class="modal fade" id="todoShowListItem" tabindex="-1" role="dialog"
                                aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-body">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-x close" data-dismiss="modal">
                                                <line x1="18" y1="6" x2="6" y2="18"></line>
                                                <line x1="6" y1="6" x2="18" y2="18"></line>
                                            </svg>
                                            <div class="compose-box">
                                                <div class="compose-content">
                                                    <h5 class="task-heading"></h5>
                                                    <p class="task-text ps">
                                                    <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
                                                        <div class="ps__thumb-x" tabindex="0"
                                                            style="left: 0px; width: 0px;"></div>
                                                    </div>
                                                    <div class="ps__rail-y" style="top: 0px; right: 0px;">
                                                        <div class="ps__thumb-y" tabindex="0"
                                                            style="top: 0px; height: 0px;"></div>
                                                    </div>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"> <svg
                                                    xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-trash">
                                                    <polyline points="3 6 5 6 21 6"></polyline>
                                                    <path
                                                        d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                    </path>
                                                </svg> Close</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="addTaskModal" tabindex="-1" role="dialog"
                    aria-labelledby="addTaskModalTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <form method=" POST" action="{{ route('todos.store') }}">
                            @csrf
                        <div class="modal-content">
                            <div class="modal-body">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-x close" data-dismiss="modal">
                                    <line x1="18" y1="6" x2="6" y2="18"></line>
                                    <line x1="6" y1="6" x2="18" y2="18"></line>
                                </svg>
                                <div class="compose-box">
                                    <div class="compose-content" id="addTaskModalTitle">
                                        <h5 class="">Add Task</h5>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="d-flex mail-to mb-4">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                            class="feather feather-edit-3 flaticon-notes">
                                                            <path d="M12 20h9"></path>
                                                            <path
                                                                d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                            </path>
                                                        </svg>
                                                        <div class="w-100">
                                                            <input id="task" type="text" placeholder="Task"
                                                                class="form-control @error('task_title')
                                                                is-invalid
                                                            @enderror"
                                                                name="task_title">
                                                            @error('task_title')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex  mail-subject mb-4">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-file-text flaticon-menu-list">
                                                    <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z">
                                                    </path>
                                                    <polyline points="14 2 14 8 20 8"></polyline>
                                                    <line x1="16" y1="13" x2="8" y2="13"></line>
                                                    <line x1="16" y1="17" x2="8" y2="17"></line>
                                                    <polyline points="10 9 9 9 8 9"></polyline>
                                                </svg>
                                                <div class="w-100">
                                                    <div id="taskdescription" class="ql-container ql-snow">
                                                        <div class="ql-editor ql-blank" data-gramm="false"
                                                            contenteditable="true" data-placeholder="Compose an epic...">
                                                            <p><br></p>
                                                        </div>
                                                        <div class="ql-clipboard" contenteditable="true" tabindex="-1">
                                                        </div>
                                                        <div class="ql-tooltip ql-hidden"><a class="ql-preview"
                                                                target="_blank" href="about:blank"></a>
                                                            <input type="text" name="task_description" data-formula="e=mc^2"
                                                                data-link="https://quilljs.com" data-video="Embed URL">
                                                            <a class="ql-action"></a>
                                                            <a class="ql-remove"></a>
                                                        </div>
                                                    </div>
                                                    <span class="validation-text"></span>
                                                </div>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i>
                                    Discard</button>
                                <button type="submit" class="btn add-tsk">Add Task</button>
                                <button class="btn edit-tsk">Save</button>
                            </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection

@push('dashboard_script')
    <script src="{{ asset('dashboard') }}/assets/js/ie11fix/fn.fix-padStart.js"></script>
    <script src="{{ asset('dashboard') }}/plugins/editors/quill/quill.js"></script>
    <script src="{{ asset('dashboard') }}/assets/js/apps/todoList.js"></script>
@endpush
