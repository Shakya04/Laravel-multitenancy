<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tenants') }}
            <x-btn-lin class="ml-4" href="{{ route('tenants.create') }}">Add tenant</x-btn-lin>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto">
                      <table class="w-full text-sm">
                        <thead class="bg-gray-50">
                          <tr>
                            <th>
                              Name
                            </th>
                            <th>
                              Email
                            </th>
                            <th>
                              Domain
                            </th>
                          </tr>
                        </thead>
                        <tbody class="text-center">
                          @foreach ($tenants as $tenant)
                          <tr class="border-b">
                            <td class="px-6 py-4">
                              {{ $tenant->name }}
                            </td>
                            <td class="px-6 py-4">
                              {{ $tenant->email }}
                            </td>
                            <td class="px-6 py-4">
                            @foreach ($tenant->domains as $domain)
                              {{ $domain->domain }}
                            @endforeach
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
