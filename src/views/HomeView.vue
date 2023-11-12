<template>
  <div id="app" class="container">
    <div class="row main-container mx-auto">
			
      <div class="row title-container no-gutters">
        <div class="col-10">
          <h1 class="title">Currency Converter</h1>
        </div>
      </div>

      <div class="row">
        <!-- input field 1 -->
        <div class="col">
       
          <h2 class="country-name">FRANCE</h2>
          <p>Rate: 1 EUR</p>
          <input id="currencyInput" class="currency-input" />
        </div>
        <!-- input field 2 -->
        <div class="col">
   
          <h2 class="country-name">UNITED STATES</h2>
          <p>Rate: 1 USD</p>
          <input id="currencyInput" class="currency-input" />
        </div>
      </div>
    </div>
  </div>
</template>



<style scoped>

.row {
  width: 100%;
}
.title-container {
  margin-bottom: 25px;
  margin-left: 0;
  text-align: center;
}
  .title {
    text-align: center;
    margin-right: 15px;
    text-align: left;
    color: black;
  }

.country-flag {
  display: inline-block;
  margin-right: 10px;
  margin-bottom: 12px;
}

h2 {
  color: #080808;
}

.country-name {
  display: inline-block;
}

.main-container {
  width: 800px;
  position: absolute;
  border-radius: 10px;
  padding: 50px;
  top: 40%;
  left: 50%;
  transform: translate(-50%, -40%);
  background: white;
  box-shadow: 0 12px 10px -6px #080808;
}

.currency-input {
  width: 70%;
  margin-right: 5px;
  font-size: 20px;
  height: 40px;
  border-radius: 5px;
  border: 1px solid #ccc;
  padding-left: 10px;
}
</style>
