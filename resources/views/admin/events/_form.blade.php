@if($errors->any())
    <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-700 text-xs font-medium">
        <ul class="list-disc list-inside space-y-1">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif 

<div class="space-y-6">
    <div>
        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Event Title *</label>
        <input type="text" name="title" value="{{ old('title', $event->title ?? '') }}" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" required>
    </div>

    <div> 
        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Description *</label>
        <textarea name="description" rows="4" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" required>{{ old('description', $event->description ?? '') }}</textarea>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div> 
            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Venue *</label>
            <input type="text" name="venue" value="{{ old('venue', $event->venue ?? '') }}" class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" required>
        </div>

        <div>
            <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Date & Time *</label>
            <input type="datetime-local" name="event_date"
                   value="{{ old('event_date', isset($event) && $event->event_date ? $event->event_date->format('Y-m-d\TH:i') : '') }}"
                   class="w-full bg-slate-50 border border-slate-300 rounded-xl px-4 py-2.5 text-slate-900 text-sm focus:outline-none focus:border-amber-500 focus:ring-1 focus:ring-amber-500" required>
        </div>
    </div>

    <div>
        <label class="block text-xs font-semibold text-slate-700 uppercase tracking-wider mb-2">Banner Image</label>
        <input type="file" name="banner_image" accept="image/*" class="w-full text-xs text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-semibold file:bg-slate-100 file:text-slate-700 hover:file:bg-slate-200">
        @if(isset($event) && $event->banner_image)
            <div class="mt-3">
                <p class="text-xs text-slate-500 mb-1">Current Banner Image:</p>
                <img src="{{ asset('storage/' . $event->banner_image) }}" class="h-32 rounded-xl object-cover border border-slate-200">
            </div>
        @endif 
    </div>

    <div class="pt-2">
        <label class="inline-flex items-center cursor-pointer">
            <input type="checkbox" name="is_published" value="1" {{ old('is_published', $event->is_published ?? false) ? 'checked' : '' }} class="rounded border-slate-300 text-amber-500 focus:ring-amber-500 w-4 h-4">
            <span class="ml-2 text-xs font-semibold text-slate-700 uppercase tracking-wider">Publish Event Immediately</span>
        </label>
    </div>

    <div class="pt-4">
        <button type="submit" class="bg-amber-500 hover:bg-amber-600 text-slate-950 font-bold px-6 py-3 rounded-xl text-xs uppercase tracking-wider transition-colors shadow-sm">
            Save Event 
        </button>
    </div>
</div>


