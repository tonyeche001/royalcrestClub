<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit: {{$event->title}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="p-4 bg-green-50 border border-green-300 rounded text-green-700">
                    {{session('success')}}
                </div>
                @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{route('admin.events.update',$event )}}" method="POST" enctype="multipart/form-data">
                        @csrf 
                        @method('PUT')
                        @include('admin.events._form')
                    </form>
                </div>
                <div class="bg-white shadow-sm sm:rounded-lg p-6">
                    <h3 class="font-semibold mb-2">Ticket Types</h3>
                    @livewire('manage-ticket-types', ['event' => $event])
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
