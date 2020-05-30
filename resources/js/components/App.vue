<template>
    <div class="h-screen bg-white">
        <div class="flex">
            <!-- レフトサイド -->
            <div class="pl-6 pt-3 bg-blue-800 w-1/6 h-screen border-r-2 border-gray-400">

                <router-link to="/">
                    <!-- メインアイコン -->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="181px" viewBox="-0.5 -0.5 181 48" content="&lt;mxfile host=&quot;app.diagrams.net&quot; modified=&quot;2020-05-23T09:29:32.051Z&quot; agent=&quot;5.0 (Macintosh; Intel Mac OS X 10_15_4) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/81.0.4044.138 Safari/537.36&quot; etag=&quot;HE6jM4ghji1ju8ChEeZ-&quot; version=&quot;13.1.3&quot; type=&quot;google&quot;&gt;&lt;diagram id=&quot;eoWUthKHQIw06nZ4uOaG&quot; name=&quot;Page-1&quot;&gt;jZNNb8IwDIZ/TY+TaAvdOA72pWmckBjaZcoa02akcQkplP36uY1L6aZJE1JJHtuJ7bwO4nlRP1pR5guUoINoJOsgvguiaDpO6NuAkwdJOPYgs0p6FPZgqb6A4YhppSTsB44OUTtVDmGKxkDqBkxYi8eh2wb18NZSZPALLFOhf9NXJV3u6U103fMnUFne3RwmU28pROfMlexzIfF4geL7IJ5bROdXRT0H3fSu64uPe/jDek7MgnH/CVi56W69eNss6/UzfOrt+2r7fsVlHISuuOAgSjSdN9sgHUtZuxO3ItlV2Bmu9u1D3ZLDeFTWvbF9CY12EBFEMSTNb+C3Eenw4BVYKYy4dEqy5v9FWLGi/DgzKtEn563c3XOekYO64bkrNIGQlhYoX/HROoxoLyqHvoLWLLTKDK1T6iRQ6rMDWKdIA7dsKJSUTfCsRGVcq6jJLJjcNd1QWs+5YoOmcdo7i1v4AS1WRoLkBLjrdA3Ufz5neBYJDRdgAc6eyIUDEpYVz9WEt8depOENs/xCoDEzwXORnQ/upUMLVk+37VXa2i5GPb7/Bg==&lt;/diagram&gt;&lt;/mxfile&gt;" onclick="(function(svg){var src=window.event.target||window.event.srcElement;while (src!=null&amp;&amp;src.nodeName.toLowerCase()!='a'){src=src.parentNode;}if(src==null){if(svg.wnd!=null&amp;&amp;!svg.wnd.closed){svg.wnd.focus();}else{var r=function(evt){if(evt.data=='ready'&amp;&amp;evt.source==svg.wnd){svg.wnd.postMessage(decodeURIComponent(svg.getAttribute('content')),'*');window.removeEventListener('message',r);}};window.addEventListener('message',r);svg.wnd=window.open('https://app.diagrams.net/?client=1&amp;lightbox=1&amp;edit=_blank');}}})(this);" style="cursor:pointer;max-width:100%;max-height:48px;"><defs/><g><rect x="0" y="9" width="180" height="30" fill="none" stroke="none" pointer-events="all"/><g transform="translate(-0.5 -0.5)"><switch><foreignObject style="overflow: visible; text-align: left;" pointer-events="none" width="100%" height="100%" requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility"><div xmlns="http://www.w3.org/1999/xhtml" style="display: flex; align-items: unsafe center; justify-content: unsafe center; width: 1px; height: 1px; padding-top: 24px; margin-left: 90px;"><div style="box-sizing: border-box; font-size: 0; text-align: center; "><div style="display: inline-block; font-size: 12px; font-family: Helvetica; color: #000000; line-height: 1.2; pointer-events: all; white-space: nowrap; "><font style="font-size: 40px" color="#e6e6e6" face="Verdana">LaraVue</font></div></div></div></foreignObject><text x="90" y="28" fill="#000000" font-family="Helvetica" font-size="12px" text-anchor="middle">LaraVue</text></switch></g></g><switch><g requiredFeatures="http://www.w3.org/TR/SVG11/feature#Extensibility"/><a transform="translate(0,-5)" xlink:href="https://desk.draw.io/support/solutions/articles/16000042487" target="_blank"><text text-anchor="middle" font-size="10px" x="50%" y="100%">Viewer does not support full SVG 1.1</text></a></switch></svg>
                </router-link>

                <p class="uppercase text-gray-500 font-bold pt-12">Create</p>

                <router-link to="/contacts/create" class="flex items-center py-2 hover:text-red-100">
                    <svg viewBox="0 0 24 24" class="fill-current text-white w-5 h-5"><path d="M23.3 11.9c0 .9-.6 1.4-1.4 1.4h-8.5v8.5c0 .9-.6 1.4-1.4 1.4s-1.4-.6-1.4-1.4v-8.5H2c-.9 0-1.4-.6-1.4-1.4 0-.9.6-1.4 1.4-1.4h8.5V1.9c0-.9.6-1.4 1.4-1.4s1.4.6 1.4 1.4v8.5h8.5c.9 0 1.5.6 1.5 1.5z"/></svg>
                    <div class="tracking-wide pl-3 text-white text-lg">Add New</div>
                </router-link>

                <p class="uppercase text-gray-500 font-bold pt-12">General</p>
                <router-link to="/contacts" class="flex items-center py-2 hover:text-red-100">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="fill-current text-white w-5 h-5"><path class="st0" d="M20 2h-1V1c0-.6-.4-1-1-1s-1 .4-1 1v1h-4V1c0-.6-.4-1-1-1s-1 .4-1 1v1H7V1c0-.6-.4-1-1-1S5 .4 5 1v1H4C1.8 2 0 3.8 0 6v14c0 2.2 1.8 4 4 4h16c2.2 0 4-1.8 4-4V6c0-2.2-1.8-4-4-4zM4 4h1v1c0 .6.4 1 1 1s1-.4 1-1V4h4v1c0 .6.4 1 1 1s1-.4 1-1V4h4v1c0 .6.4 1 1 1s1-.4 1-1V4h1c1.1 0 2 .9 2 2v2H2V6c0-1.1.9-2 2-2zm16 18H4c-1.1 0-2-.9-2-2V10h20v10c0 1.1-.9 2-2 2zM8 14c0 .6-.4 1-1 1H5c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1zm6 0c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1zm6 0c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1zM8 18c0 .6-.4 1-1 1H5c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1zm6 0c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1zm6 0c0 .6-.4 1-1 1h-2c-.6 0-1-.4-1-1s.4-1 1-1h2c.6 0 1 .4 1 1z"/></svg>
                    <div class="tracking-wide pl-3 text-white text-lg">Contacts</div>
                </router-link>
                <router-link to="/birthdays" class="flex items-center py-2 hover:text-red-100">
                    <svg viewBox="0 0 24 24" class="fill-current text-white w-5 h-5"><path fill-rule="evenodd" d="M12.1 6.8c1.2 0 2.1-1 2.1-2.1 0-.4-.1-.8-.3-1.1L12.1.5l-1.8 3.1c-.2.3-.3.6-.3 1 0 1.2 1 2.2 2.1 2.2zm6.4 3.1h-5.3V7.8h-2.1v2.1H5.8c-1.8 0-3.2 1.4-3.2 3.2v9.5c0 .6.5 1.1 1.1 1.1h16.9c.6 0 1.1-.5 1.1-1.1v-9.5c0-1.8-1.5-3.2-3.2-3.2zm1 11.7H4.7v-3.2c1 0 1.9-.4 2.5-1.1l1.2-1.1 1.1 1.1c1.4 1.4 3.8 1.4 5.2 0l1.1-1.1 1.1 1.1c.7.7 1.6 1.1 2.5 1.1v3.2h.1zm0-4.8c-.5 0-1-.2-1.4-.6l-2.3-2.3-2.3 2.3c-.8.8-2.1.8-2.9 0l-2.3-2.3L6 16.2c-.4.4-.9.6-1.4.6v-3.7c0-.6.5-1.1 1.1-1.1h12.7c.6 0 1.1.5 1.1 1.1v3.7z" clip-rule="evenodd"/></svg>
                    <div class="tracking-wide pl-3 text-white text-lg">Birthdays</div>
                </router-link>

                <p class="uppercase text-gray-500 font-bold pt-12">Settings</p>
                <router-link to="/" class="flex items-center py-2 hover:text-red-100">
                    <svg viewBox="0 0 24 24" class="fill-current text-white w-5 h-5"><path d="M21 3h-3.8c-.7 0-1.3-.6-1.3-1.3S16.5.4 17.2.4h5.1c.7 0 1.3.6 1.3 1.3v20.5c0 .7-.6 1.3-1.3 1.3h-5.1c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3H21V3zm-6.9 7.7L8.6 5.2c-.5-.5-.6-1.3-.1-1.8s1.3-.5 1.8 0l7.7 7.7c.8.8.2 2.2-.9 2.2H1.8c-.7 0-1.3-.6-1.3-1.3 0-.7.6-1.3 1.3-1.3h12.3zm-1.6 4.8c.5-.5 1.3-.4 1.8.1s.4 1.3-.1 1.8l-3.8 3.2c-.5.5-1.3.4-1.8-.1-.6-.5-.5-1.3 0-1.7l3.9-3.3z"/></svg>
                    <div class="tracking-wide pl-3 text-white text-lg">Logout</div>
                </router-link>

            </div>


            <!-- ライトサイド -->
            <div class="flex flex-col flex-1 h-screen overflow-y-hidden">

                <!-- ヘッダー -->
                <div class="h-16 px-6 border-b border-gray-400 flex items-center justify-between">
                    <div>
                        Contacts
                    </div>

                    <div class="flex items-center">
                        <SearchBar />
                        <UserCircle :name="user.name"/>
                    </div>

                </div>

                <!-- メインコンテンツ -->
                <div class="flex flex-col overflow-y-hidden flex-1">
                    <router-view class="p-6 overflow-x-hidden">

                    </router-view>
                </div>
            </div>

        </div>

    </div>
</template>

<script>
    import UserCircle from "./UserCircle";
    import SearchBar from "../components/SearchBar";
    export default {
        name: "App",
        props: [
            'user'
        ],

        components: {
            UserCircle,
            SearchBar,
        },

        created() {
            window.axios.interceptors.request.use(
                (config) => {
                    if (config.method === 'get') {
                        config.url = config.url + '?api_token=' + this.user.api_token;
                    } else {
                        config.data = {
                            ...config.data,
                            api_token: this.user.api_token
                        };
                    }
                    return config;
                }
            )
        }
    }
</script>

<style scoped>

</style>

