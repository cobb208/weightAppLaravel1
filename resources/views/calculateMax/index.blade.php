@extends('.components.main')
@section('title', 'Calculate Your Max')
@section('body')
    <div class="w-full">
        <p class="text-gray-600 italic">Enter your weight in increments of 5 and see what percentage it is.</p>
    </div>
    <div class="flex flex-col md:flex-row mt-3">
        <div class="basis-1/4">
            <form class="p-3 border-black border-solid border-2 mx-5" action="{{ route('calculateMax.index') }}" method="GET">
                <div class="mb-3">
                    <h3 class="text-xl underline">Enter Your Numbers:</h3>
                </div>
                <div class="mb-3">
                    <label for="weight" class="block italic">Weight:</label>
                    <input
                        type="number"
                        class="block border-gray-400 border-solid border-2 rounded"
                        id="weight"
                        name="weight"
                        min="0"
                        step="5"
                        required
                        @if(isset($results['weight']))
                            value="{{ $results['weight'] }}"
                        @endif
                    >
                </div>
                <div class="mb-3">
                    <label for="percentage" class="block italic">Percentage:</label>
                    <input
                        type="number"
                        class="block border-gray-400 border-solid border-2 rounded"
                        id="percentage"
                        name="percentage"
                        min="0"
                        step="5"
                        required
                        @if(isset($results['percentage']))
                            value="{{ $results['percentage'] }}"
                        @else
                            value="100"
                        @endif
                    >
                </div>
                <div class="mb-3">
                    <button type="submit" class="px-3 py-1 bg-blue-500 underline rounded text-white hover:bg-blue-400">
                        Calculate
                    </button>
                </div>
            </form>
        </div>
        @if(isset($results))
            <div class="basis-1/2 mx-5">
                <table class="text-center">
                    <thead>
                        <tr>
                            <th class="px-2" scope="col">Percentage</th>
                            <th class="px-2" scope="col">Weight</th>
                        </tr>
                    </thead>
                    <tbody class="text-xl">
                        <tr>
                            <td class="font-bold border-black border-solid border-2">{{ $results['percentage'] }}%</td>
                            <td class="font-bold border-black border-solid border-2">
                                <a
                                    class="text-blue-600"
                                    href="{{ route('barbellCalculator.index') . '?weight=' . $results['weight'] }}"
                                >
                                    {{ $results['weight'] }}
                                </a>
                            </td>
                        </tr>
                        @foreach($results['percentage_steps'] as $step)
                            <tr class="border-b-2 border-black">
                                <td>{{ $step['percentage'] }}%</td>
                                <td>
                                    <a
                                        class="text-blue-600"
                                        href="{{ route('barbellCalculator.index') . '?weight=' . $step['weight'] }}"
                                    >
                                        {{ $step['weight'] }}
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection



