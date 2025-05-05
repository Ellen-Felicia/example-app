<x-layout>
    <x-slot:heading>
        Job and Salary
    </x-slot:heading>

<h2 class="font-bold text-lg"> {{$job->title}} </h2>

<p>
    This job pays {{$job->salary}} per year.
</p>

@can('edit', $job)
         <p class="mt-6">
            <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
         </p>
@endcan

<div class="mt-10">
<a href="/jobs" class="text-blue-500 hover:underline">Go back</a>
</div>

</x-layout>

