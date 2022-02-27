@extends('components.main')
@section('title', 'Barbell Calculator')
@section('body')
    <div class="flex flex-col md:flex-row mt-3">
        <div class="basis-1/4 border-black border-solid border-2 mx-5">
            <form class="m-5" action="#" id="barbellForm">
                <div class="mb-3">
                    <h3 class="text-xl underline">Enter Your Numbers:</h3>
                </div>
                <div class="mb-3">
                    <label for="targetWeightInput" class="block italic">Target Weight:</label>
                    <input type="number" class="block border-gray-400 border-solid border-2 rounded" id="targetWeightInput" min="0" step="5" required>
                </div>
                <div class="mb-3">
                    <label for="barbellWeight" class="block italic">Barbell Weight:</label>
                    <input type="number" class="block border-gray-400 border-solid border-2 rounded" id="barbellWeight" value="45" min="0" required>
                </div>
                <div class="mb-3">
                    <button type="submit" class="px-3 py-1 bg-blue-500 underline rounded text-white hover:bg-blue-400">
                        Calculate
                    </button>
                </div>
            </form>
        </div>
        <div class="basis-1/2 mx-5">
            <table class="text-center">
                <thead>
                <tr>
                    <th class="px-2 border-l-black border-l-2" scope="col">Target Weight</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">Barbell Weight</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">45</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">35</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">25</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">15</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">10</th>
                    <th class="px-2 border-x-black border-x-2" scope="col">5</th>
                    <th class="px-2 border-r-black border-r-2" scope="col">2.5</th>
                </tr>
                </thead>
                <tbody id="resultsBody">
                </tbody>
            </table>
        </div>
    </div>
    <script defer>
        const barbellCalcUrl = '{{ route('calculate_barbell') }}';
    </script>
@endsection
