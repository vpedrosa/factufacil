<template>
    <div>
        <div class="row" v-for="line in lines" >
            <div class="col">
                <div class="form-group">
                    <label for="product">Producto:</label>
                    <input type="text" name="product" id="product" class="form-control" :v-model="invoice_lines[line].product">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="unit-price">Precio por unidad:</label>
                    <input type="text" name="unit-price" id="unit-price" class="form-control" :v-model="invoice_lines[line].unit_price">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="amount">Unidades:</label>
                    <input type="text" name="amount" id="amount" class="form-control" :v-model="invoice_lines[line].amount">
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <button type="button" class="btn btn-primary" v-on:click="addLine">Primary</button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        lines:1,
        invoiceLines:[{
            product:"",
            unit_price:0,
            amount:1
        }],
        addLine : function(event) {
            this.lines++;
            this.invoiceLines.push({
                product:"",
                unit_price:0,
                amount:1
            });
        }
    }
</script>
