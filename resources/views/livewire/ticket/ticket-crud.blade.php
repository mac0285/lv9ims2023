<x-slot name="header">
    <h2 class="text-center font-semibold text-sm text-gray-800 leading-tight">Ticket System</h2>
</x-slot>
<div class="flex flex-col">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            @if (session()->has('message'))
            <div class=" text-center py-4 lg:px-4">
                <div class="p-2 bg-gray-500 items-center text-indigo-100 leading-none lg:rounded-full flex lg:inline-flex" role="alert">
                    <span class="flex rounded-full bg-indigo-500  px-2 py-1 text-xs  mr-3">News</span>
                    <span class="flex rounded-full bg-indigo-500  px-2 py-1 text-xs  mr-3"> {{ session('message') }} </span>
                    <svg class="fill-current opacity-75 h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M12.95 10.707l.707-.707L8 4.343 6.586 5.757 10.828 10l-4.242 4.243L8 15.657l4.95-4.95z"/></svg>
                </div>
            </div>
            @endif
            <button wire:click="create()" class="bg-green-500 hover:bg-green-700 text-white px-6 rounded-full">&#x2719;</button>
            @if($isModalOpen)
            @include('livewire.ticket.create_ticket')
            @elseif($isModalEdit)
            @include('livewire.ticket.update_ticket')
            @endif

            
            <table class="table-fixed bg-with-border text-white w-full bg-gray-500 divide-y px-4 py-4 my-3 shadow-md rounded">
                <thead>
                    <tr> 
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">ID &duarr;</th>
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">User &duarr;</th>
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Title &duarr;</th> 
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Cat</th>
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">priority</th>
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Overdue</th>
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Status</th>  
                        <th class="px-8 py-3 text-left text-xs font-medium text-gray-100 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-100 uppercase tracking-wider">  Action  </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                 @if($tickets->count())
                    @foreach($tickets as $ticket)
                    <tr>
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">

                        
                     T-{{$ticket->ticketid}} </div> </td>
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">
                    {{ $ticket->ticket_user }}</td>
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">
                    {{ $ticket->ticket_title}}</td> 
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">
                    {{ $ticket->ticket_categories }}</td>
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">
                    <div class="text-sm font-small text-gray-900">{{ $ticket->ticket_priority}}</td>
                        <td class="text-sm font-medium text-gray-900"><div class="ml-4">
                    {{ $ticket->ticket_overdue }}</td>
                        <td class="text-sm font-medium text-gray-900">
                            @if($ticket->ticket_status)
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">{{ $ticket->ticket_status }}</span></td>  
                            @else
                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-green-800">{{ $ticket->ticket_status }}</span></td>  
                            @endif
                        <td class="text-sm font-medium text-gray-900">{{ $ticket->created_at}}</td>
                        <td class="text-sm font-medium text-gray-900">
                        @if(auth()->user()->is_admin == 1)
                            @if($ticket->ticket_solve)
                       <!--  <button wire:click="markAsOpen({{ $ticket->id }})" class="text-sm font-medium bg-red-500 hover:bg-red-700 text-white px-6 rounded-full">
                            open
                        </button> -->
                    @else
                     <!--   <button wire:click="markAsClose({{ $ticket->id }})" class="text-sm font-medium bg-green-500 hover:bg-green-700 text-white px-6 rounded-full">
                            close
                        </button> -->
                    @endif

                            <button wire:click="edit({{ $ticket->id}})"
                                class=" bg-green-500 hover:bg-green-700 text-white px-3 rounded-full">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                    <path d="M5 4a1 1 0 00-2 0v7.268a2 2 0 000 3.464V16a1 1 0 102 0v-1.268a2 2 0 000-3.464V4zM11 4a1 1 0 10-2 0v1.268a2 2 0 000 3.464V16a1 1 0 102 0V8.732a2 2 0 000-3.464V4zM16 3a1 1 0 011 1v7.268a2 2 0 010 3.464V16a1 1 0 11-2 0v-1.268a2 2 0 010-3.464V4a1 1 0 011-1z" />
                                    </svg></button>
                             <button wire:click="delete({{ $ticket->id }})"
                                class="bg-red-500 hover:bg-red-700 text-white px-3 rounded-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg></button>  
                    
                    
                    @if($ticket->active)
                        <button wire:click="markAsDisable({{ $ticket->id }})" class="bg-red-500 hover:bg-red-600 text-white px-3 rounded-full">
                            &cross;
                        </button>
                            <!--  
                        <button wire:click="chat({{ $ticket->id }})" class="bg-blue-500 hover:bg-blue-700 text-white px-3 rounded-full">
                            Show
                        </button>-->
                    @else
                        
                    @endif
                    @else
                       <button wire:click="chat({{ $ticket->id }})" class="bg-blue-500 hover:bg-blue-700 text-white px-3 rounded-full">
                            Show
                        </button> 
                    @endif
                   
                        </td>
                        
                    </tr>
                    @endforeach 
                    @else
                        <tr>
                            <td class="table-fixed bg-with-border text-white w-full bg-gray-500   shadow-md rounded"> not show any data my table remains empty </td>
                        </tr>
                    @endif
                </tbody>
                
            </table>
 
                     {{ $tickets->links() }}

        </div>
    </div>
</div>