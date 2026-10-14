<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            CheckIn Scanner
            
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{route('admin.checkin.store')}}">
                        @csrf 
                        <input name="code" autofocus placeholder="Scan or type ticket code">
                        <button>Check in</button>
                    </form>
                    @if(session('result'))
                    <p class="{{session('result')[0] === 'success' ? 'text-green-600': 'text-red-600'}}">
                        {{session('result')[1]}}
                    </p>
                    @endif 
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
