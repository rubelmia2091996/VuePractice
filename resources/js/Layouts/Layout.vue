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
                <div class="space-x-6">
                    <Link :href="route('register')" class="nav-link">Register </Link>
                </div>
            </nav>
        </Header>
        <main class="p-4">
            <slot/>
        </main>
    </div>
</template>