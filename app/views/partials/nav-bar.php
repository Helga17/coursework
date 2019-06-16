<header>
    <nav class="navbar bg-white text-dark justify-content-end">
        <ul class="nav">
            <li class="nav-item pr-4">
                <?php if ($isInSession): ?>
                    <a v-on:click="exit()"><i class="fa fa-sign-in"></i></a>
                <?php else: ?>
                    <i class="fa fa-user-o" aria-hidden="true" v-on:click="showAuthenticationForm()"></i>
                <?php endif; ?>
            </li>
        </ul>
    </nav>
</header>
