<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body>
	<main class="w-screen h-screen bg-slate-800 flex flex-col items-center justify-center">


		@foreach ($listItems as $listItem)
			<div class="text-white">
				Item : {{ $listItem->name }} 
				<form  method="POST" action="{{ route('markComplete', $listItem->id) }}">
					@csrf
					<button class="bg-zinc-500 text-white p-1 rounded-md mb-3" type="submit">Mark complete</button>
				</form>
			</div>
		@endforeach


		<div class="bg-slate-600  w-[25%] rounded-md">
			<form method="POST" action="{{ route('saveItem') }}" class="flex flex-col gap-5">
				@csrf
				<label for="" class="text-white p-3 pb-0 self-center">Add a task :</label>
				<input type="text" name="itemInput" id="itemInput" class="w-[80%] self-center">
				<button type="submit" class="bg-blue-500 text-white w-[40%] self-center mb-5 rounded-md">Save Item</button>
			</form>
		</div>
	</main>
</body>
</html>
