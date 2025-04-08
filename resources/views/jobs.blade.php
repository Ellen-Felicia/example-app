<x-layout>
    <x-slot:heading>
        Jobs Listing
    </x-slot:heading>

    <h1><strong> List of Jobs </strong></h1>

<ul>
    @foreach ($jobs as $job)
    <li>
        <a href="/jobs/{{$job['id']}}">
        <strong>{{$job['title']}}: </strong> Pays {{$job['salary']}} per year.
    </a>
    </li>    
    @endforeach
</ul>

</x-layout>