@extends('layouts.app')
@section('content')
    <div id="ind">
        <form id="search">
            Search
            <input name="query" v-model="searchQuery">
        </form>
        <data-table :data="gridData" :columns-to-display="gridColumns" :filter-key="searchQuery" :display-names="displayNames" :child-hideable="true" :child-init-hide="true" :columns-to-not-sort="['action']">
            <template>Hola</template>
        </data-table>
        </div>
    </div>


    <script type="text/javascript">
        Vue.use(DataTable);

        new Vue({
            el: '#ind',
            data: {
                searchQuery: '',
                gridColumns: ['name', 'power', 'action'],
                displayNames: {
                    'power': 'Super Powers'
                },
                gridData: [{
                    name: 'Chuck Norris',
                    power: Infinity
                }, {
                    name: 'Bruce Lee',
                    power: 9000
                }, {
                    name: 'Jackie Chan',
                    power: 7000
                }, {
                    name: 'Jet Li',
                    power: 8000
                }]
            },
            methods: {
                showPower(power) {
                    alert(power);
                }
            }
        })

    </script>
@endsection