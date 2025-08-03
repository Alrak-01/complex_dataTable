<tr wire:key={{$user['id']}} class="border-b dark:border-gray-700">
        <th scope="row"
            class="px-4 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white capitalize">{{ $user['name'] }}</th>
        <td class="px-4 py-3">{{ $user['email'] }}</td>
        <td class="px-4 py-3 capitalize text-green-500">{{ $user['role'] }}</td>
        <td class="px-4 py-3">{{ $user['created_at'] }}</td>
        <td class="px-4 py-3">{{ $user['updated_at'] }}</td>
        <td class="px-4 py-3 flex items-center justify-end">
            <button wire:confirm="Are you sure you wanna delete {{$user['name']}}" wire:click="destroy({{$user['id']}})" class="px-3 py-1 bg-red-500 text-white rounded">X</button>
        </td>
</tr>