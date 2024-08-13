<x-app-layout>

    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Blog Content") }}
                </div>
                <div class="flex justify-end">
                    <a href="{{route('blogs.create')}}" class="px-4 py-2  bg-green-700 hover:bg-green-500 rounded-md text-white">Create Blog</a>
                </div>


                <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Title
                                </th>

                                <th scope="col" class="px-6 py-3">
                                    Content
                                </th>
                                
                                @if(auth()->check() )
                                <th scope="col" class="flex justify-end px-6 py-3">
                                    Actions
                                </th>
                                @endif
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($blogs as $blog)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                                <td class="px-6 py-4">{{$blog->title}} </td>
                                <td class="px-6 py-4">{{$blog->content}} </td>

                                @if(auth()->check() && (auth()->user()->hasRole('admin') || auth()->id() === $blog->user_id) )
                                <td>
                                    <div class="flex justify-end">
                                        <div class="spaxe-x-2">
                                            <a href="{{route('blogs.edit', $blog->id)}}" 
                                            class="px-4 py-2 bg-blue-500 hover:bg-blue-700 text-white rounded-md">Edit</a>

                                            <form method="POST" action="{{route('blogs.destroy', $blog->id)}}" 
                                            class="inline-block"  
                                            onsubmit="return confirm('Are you sure?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"  
                                                class="px-4 py-2 bg-red-500 hover:bg-red-700 text-white rounded-md">
                                                    Delete</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>























