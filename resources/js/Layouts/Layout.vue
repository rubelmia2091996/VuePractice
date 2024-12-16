<template>
    <Head>
        <title>MY App</title>
        <meta head-key="description" name="description" content="This is layout page">
    </Head>
    <div>
        <Header>
            <nav >
                <div class="space-x-6">
                    <Link :href="route('home')" class="nav-link">Home </Link>
                    
                </div>
                <div class="space-x-6"  v-if="$page.props.auth.user">
                    <Link :href="route('logout')" class="nav-link" method="post" as="button" type="button">Log Out </Link>
                </div>

                <div class="space-x-6" v-else>
                    <Link :href="route('register')" class="nav-link">Register </Link>
                    <Link :href="route('login')" class="nav-link">Log In </Link>
                    
                </div>
            </nav>
        </Header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>