@extends('mainLayout')
@section('title','Manage Users')
@section('page-content')

<div class="container-fluid">
    <div class="row ps-1">
        <div class="col bg-dark text-light fs-5 text-start">User Management</div>
    </div>
    <div class="row">
        <div class="col">
                <table class="table table-striped-columns table-hover fs-6" >
                    <tr class="text-center" style="--bs-table-bg: #414a4c;">
                        <th class="text-white">User ID</th>
                        <th class="text-white">User Name</th>
                        <th class="text-white">Full Name</th>
                        <th class="text-white">E-mail</th>
                        <th class="text-white" colspan="2">Actions</th>
                    </tr>
                 @foreach($users as $user)
                    <tr style="--bs-table-hover-bg: #C6F7D0;">
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->userInfo->user_firstname.' '.$user->userInfo->user_lastname }}</td>
                        <td>{{ $user->email }}</td>
                        <td class="text-center">
                            <button type="submit" title="Remove Selected User" style="border-style: none; background: transparent;">
                                <a href="{{ route('users.edit', $user->id) }}" title="Manage Selected User">
                                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 128 128">
                                        <path d="M 79.335938 15.667969 C 78.064453 15.622266 76.775 15.762109 75.5 16.099609 C 72.1 16.999609 69.299609 19.199219 67.599609 22.199219 L 64 28.699219 C 63.2 30.099219 63.699609 32.000781 65.099609 32.800781 L 82.400391 42.800781 C 82.900391 43.100781 83.400391 43.199219 83.900391 43.199219 C 84.200391 43.199219 84.399219 43.199609 84.699219 43.099609 C 85.499219 42.899609 86.1 42.399219 86.5 41.699219 L 90.199219 35.199219 C 91.899219 32.199219 92.4 28.700781 91.5 25.300781 C 90.6 21.900781 88.400391 19.100391 85.400391 17.400391 C 83.525391 16.337891 81.455078 15.744141 79.335938 15.667969 z M 60.097656 38.126953 C 59.128906 38.201172 58.199219 38.724609 57.699219 39.599609 L 27.5 92 C 24.1 97.8 22.200781 104.30039 21.800781 110.90039 L 21 123.80078 C 20.9 124.90078 21.5 125.99961 22.5 126.59961 C 23 126.89961 23.5 127 24 127 C 24.6 127 25.199219 126.8 25.699219 126.5 L 36.5 119.40039 C 42 115.70039 46.7 110.8 50 105 L 80.300781 52.599609 C 81.100781 51.199609 80.599219 49.3 79.199219 48.5 C 77.799219 47.7 75.899609 48.199609 75.099609 49.599609 L 44.800781 102 C 41.900781 106.9 37.899609 111.20039 33.099609 114.40039 L 27.300781 118.19922 L 27.699219 111.30078 C 27.999219 105.60078 29.699609 100 32.599609 95 L 62.900391 42.599609 C 63.700391 41.199609 63.200781 39.3 61.800781 38.5 C 61.275781 38.2 60.678906 38.082422 60.097656 38.126953 z M 49 121 C 47.3 121 46 122.3 46 124 C 46 125.7 47.3 127 49 127 L 89 127 C 90.7 127 92 125.7 92 124 C 92 122.3 90.7 121 89 121 L 49 121 z M 104 121 A 3 3 0 0 0 101 124 A 3 3 0 0 0 104 127 A 3 3 0 0 0 107 124 A 3 3 0 0 0 104 121 z"></path>
                                    </svg>
                                </a>
                            </button>
                        </td>
                        <td class="text-center">
                            <!-- <a href="{{ route('users.delete', $user->id) }}" class="pt-.5 pb-2 px-1 bg-danger rounded" title="Remove Selected User">
                                <svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="white" class="bi bi-person-x bg-danger" viewBox="0 0 16 16">
                                    <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m.256 7a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m-.646-4.854.646.647.646-.647a.5.5 0 0 1 .708.708l-.647.646.647.646a.5.5 0 0 1-.708.708l-.646-.647-.646.647a.5.5 0 0 1-.708-.708l.647-.646-.647-.646a.5.5 0 0 1 .708-.708"/>
                                </svg>
                            </a> -->
                            <form action="{{ route('users.delete', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" title="Remove Selected User" style="border-style: none; background: transparent;">
                        <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="50" height="50" viewBox="0 0 32 32">
                            <path d="M29,7.5c0-1.93-1.57-3.5-3.5-3.5H17V3c0-0.553-0.447-1-1-1s-1,0.447-1,1v1H6.5C4.57,4,3,5.571,3,7.5c0,0.553,0.447,1,1,1	s1-0.447,1-1C5,6.673,5.673,6,6.5,6h19C26.327,6,27,6.673,27,7.5S26.327,9,25.5,9c-0.09,0-0.171,0.029-0.254,0.051	c-0.064-0.017-0.122-0.046-0.19-0.049c-0.02-0.001-0.037,0.008-0.056,0.008L25,9H10.989l0.873,16.412	c0.044,0.828-0.591,1.534-1.418,1.578c-0.014,0-0.027,0.001-0.041,0.001c-0.033-0.002-0.065-0.006-0.097-0.009	c-0.078-0.003-0.15-0.025-0.225-0.041C9.41,26.766,8.9,26.179,8.859,25.455L7.998,9.945c-0.03-0.551-0.487-0.973-1.054-0.942	c-0.551,0.03-0.974,0.502-0.942,1.054l0.861,15.511C6.971,27.493,8.565,29,10.493,29h11.014c1.928,0,3.522-1.508,3.63-3.434	l0.811-14.612C27.665,10.732,29,9.277,29,7.5z"></path>
                        </svg>
                    </button>
                </form>
                        </td>
                    </tr>
                 @endforeach
                 <tr>
                    <td colspan="7">
                        {{ $users->links() }}
                    </td>
                 </tr>
            </table>
        </div>
    </div>
    <div class="row">
        <div class="col">
            <div class="d-grid gap-2 col-6 mx-auto">
                <button type="button" class="btn btn-secondary btn-lg btn-block"><a href="{{ route('dash') }}" class="link-dark text-white" style="text-decoration: none;">Back</a></button>
            </div>
        </div>
    </div>
</div>
@endsection
