<template>
    <div class="content">
        <div class="row profile-head py-4 d-flex flex-column justify-content-center align-items-center">
            <div class="col-md-12">
                <h1 class="display-3 text-white text-center">{{ lang('Budget vs. Expenses') }}</h1>
            </div>
        </div>

        <!-- Display fileds -->
        <div class="profile-head pb-2 row">
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Budget') }}</h6>
                <h3 class="mb-1 text-white">123.450 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Expenses') }}</h6>
                <h3 class="mb-1 text-white">155.446 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference') }}</h6>
                <h3 class="mb-1 text-white">22.985 kn</h3>
           </div>
           <div class="col-md-3">
                <h6 class="white-label">{{ lang('Difference in precentage') }}</h6>
                <h3 class="mb-1 text-white">18%</h3>
           </div>
        </div>

        <!-- Table -->
        <div class="page-name-xl mb-3 mt-3">{{ lang('Authors Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td>Author 1</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Author 1</td>
                <td>10%</td>
                <td>15%</td>
                <td>5%</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">1</th>
                <td>Author 2</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>
        
        <div class="page-name-xl mb-3 mt-3">{{ lang('Production Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td>Text</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Reviews</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Lecture</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Correction</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Proofreading</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Translation</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Index</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Epilogue</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Photos</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>illustrations</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Tehnical drawings</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Expert report</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Copyright mediator</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>METHODICAL INSTRUMENTARIUM</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Selection</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Powerpoint presentation</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Additional expenses ?!?!?!</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>

            </tbody>
        </table>
        
        <div class="page-name-xl mb-3 mt-3">{{ lang('Marketing Expenses') }}</div>
        <table class="table">
            <thead class="thead-inverse">
            <tr>
                <th>#</th>
                <th>{{ lang('Item') }}</th>
                <th>{{ lang('Budget') }}</th>
                <th>{{ lang('Expense Total') }}</th>
                <th>{{ lang('Difference') }}</th>
                <th>{{ lang('Cost Approval') }}</th>
            </tr>
            </thead>
            <tbody class="white">
            <tr>
                <th scope="row">1</th>
                <td>Marketing budget</td>
                <td>10.000 kn</td>
                <td>15.500 kn</td>
                <td>5.500 kn</td>
                <td><div class="file-box-sty icon icon-cost-approval">{{ lang('Send for Approval') }}</div></td>
            </tr>
            </tbody>
        </table>   
             
    </div>
 
</template>
<script>
    export default {
        data: function () {
            return {}
        },
        computed: {},
        methods: {}
    }
</script>