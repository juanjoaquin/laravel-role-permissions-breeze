<x-admin-layout>
    <!-- Page Heading -->
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
                <div class="p-6 text-gray-900">
                    {{ __("Permission Content") }}
                </div>

                <div class="flex justify-end">
                    <a href="{{route('admin.permissions.create')}}" class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md text-white">Create Permission</a>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    PERMISSION NAME
                                </th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach($permissions as $permission)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td class="px-6 py-4">{{$permission->name}} </td>

                                <td>
                                    <div class="flex justify-end">
                                        <div class="spaxe-x-2">
                                            <a href="{{route('admin.permissions.edit', $permission->id)}}" 
                                            
                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>
                                            
                                            <form method="POST" action="{{route('admin.permissions.destroy', $permission->id)}}"

                                             class="inline-block" 
                                             
                                             onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>