<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('dashboard') ? '' : 'collapsed' }}" href="{{route('dashboard')}}" wire:navigate disabled>
                <i class="bi bi-house"></i>
                <span>Home</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('transaction_history') ? '' : 'collapsed' }}" href="{{route('transaction_history')}}" wire:navigate>
                <i class="bi bi-wallet"></i>
                <span>Transaction History</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ request()->routeIs('withdrawal') ? '' : 'collapsed' }}" href="{{route('withdrawal')}}" wire:navigate>
                <i class="bi bi-coin"></i>
                <span>- Withdraw</span>
            </a>
        </li>
        <hr>
        <li class="nav-item">
            <div class="nav-link">
                {{-- sign out --}}
                <livewire:user.logout />
            </div>

        </li>
        <!-- End Dashboard Nav -->

    </ul>

</aside>