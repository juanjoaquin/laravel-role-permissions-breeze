<x-admin-layout>

    @if (isset($header))
    <header class="bg-white shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            {{ $header }}
        </div>
    </header>
    @endif

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-start">
                    <a href="{{route('admin.permissions.index')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Role Index</a>
                </div>
                <div class="flex flex-col py-2">
                    <div class="space-y-8 divide-y divide-gray-200 w-1/2 mt-10">

                        <form method="POST" action="{{route('admin.roles.update', $role->id)}}">
                            @csrf
                            @method('PUT')
                            <div class="sm:col-span-6">
                                <label for="name" class="block text-sm font-medium text-gray-700"> Post name </label>
                                <div class="mt-1">
                                    <input type="text" id="name" name="name" class="block w-full appearance-none bg-white border border-gray-400 rounded-md py-2 px-3 text-base leading-normal transition duration-150 ease-in-out sm:text-sm sm:leading-5" value="{{$role->name}}" />

                                </div>
                                @error('name') <span class="text-red-400 text-sm">{{$message}}</span> @enderror
                            </div>

                            <div class="sm:col-span-6 pt-5">
                                <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Update</button>
                            </div>
                    </div>
                    </form>

                </div>
                <div class="mt-6 p-2">
                    <h2 class="text-2xl font-semibold">Role Permissions</h2>
                    <div>
                        @if($role->permissions)
                        @foreach($role->permissions as $role_permission)
                        <form method="POST" action="{{route('admin.roles.permissions.revoke', [$role->id, $role_permission->id]) }}"  class="inline-block" onsubmit="return confirm('Are you sure?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="mt-4 px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                {{$role_permission->name}}</button>
                        </form>
                        @endforeach
                        @endif
                    </div>
                    <div class="max-w-xl">
                        <form method="POST" action="{{route('admin.roles.permissions', $role->id)}}">
                            @csrf
                            <div class="sm:col-span-6">

                                <br />
                                <select id="permission" name="permission" autocomplete="permission-name" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                    @foreach($permissions as $permission)
                                    <option value="{{$permission->name}}">{{$permission->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('name') <span class="text-red-400 text-sm">{{$message}}</span> @enderror
                    </div>

                    <div class="sm:col-span-6 pt-5">
                        <button type="submit" class="px-4 py-2 bg-green-500 hover:bg-green-700 rounded-md">Assign</button>
                    </div>
                </div>
                </form>
            </div>

        </div>

    </div>
    </div>
    </div>
    </div>
</x-admin-layout>