<x-layout>
    <x-slot:heading>
        Job and Salary
    </x-slot:heading>

<h2 class="font-bold text-lg"> {{$job['title']}} </h2>

<p>
    This job pays {{$job['salary']}} per year.
</p>

<div class="mt-10">
<a href="/jobs" class="text-blue-500 hover:underline">Go back</a>
</div>

</x-layout>

