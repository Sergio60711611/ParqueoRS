<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precios</title>
    
</head>
<body>
    <a href="https://docs.google.com/spreadsheets/d/1coiiOl7X8jvyJHfHHhlNeNocOllCW87XzBzhJG5RGBw/edit#gid=233398817" target="_blank" rel="noopener noreferrer">
        <div class="editlink">Modificar<br />Precios</div>
    </a>
    <div id="app">
        <section id="specialssection" class="specials-container" v-if="menuItems_L" :style="menuStyle">
            <div id="special_component" :style="menuStyle">
                <h1>Precios del parqueo</h1>
                <div class="specials-table-container">
                    <table>
                        <tbody v-for="item in menuItems_L" :key="`specialmenu-${item.name}`">
                            @verbatim
                            <tr class="nameandprice">
                                <td :style="dotStyle">
                                    <span :style="menuStyle">{{item.name}}</span>
                                </td>
                                <td :style="dotStyle">
                                    <span :style="menuStyle">{{item.price}}</span>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">{{item.description}}</td>
                            </tr>
                            @endverbatim
                        </tbody>
                        <tbody v-for="item in menuItems_R" :key="`specialmenu-${item.name}`">
                            @verbatim
                            <tr class="nameandprice">
                                <td :style="dotStyle">
                                    <span :style="menuStyle">{{item.name}}</span>
                                </td>
                                <td :style="dotStyle">
                                    <span :style="menuStyle">{{item.price}}</span>
                                </td>
                            </tr>
                            <tr class="description">
                                <td colspan="2">{{item.description}}</td>
                            </tr>
                            @endverbatim
                        </tbody>
                    </table>
                    
                </div>
            </div>
            <button class="btn-corner" style="border-radius: 20px; border: 1px solid #ff4b2b; background: #ff4b2b; color: #fff; font-size: 12px; font-weight: bold; padding: 12px 45px; letter-spacing: 1px; text-transform: uppercase; transition: transform 80ms ease-in;" onclick="window.location.href = '..'">Atras</button>
        </section>
        
    </div>
        <style>
        body,
    html {
        margin: 0;
        padding: 0;
        background-color: #ffe6d1;
    }
    
    a{
      text-decoration: none;
    }
    
    .editlink {
        background-color: #ff4b2b;
        color: #fff;
        border-radius: 50%;
        height: 100px;
        width: 100px;
        position: fixed;
        right: 20px;
        top: 15px;
        text-align: center;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 13px;
        font-family: Quicksand,
            sans-serif;
        font-weight: 600;
        
        box-shadow: 2px 2px 3px rgba(0, 0, 0, 0.4);
        cursor: pointer;
    }
    
    .specials-container {
        display: flex;
        justify-content: center;
        align-items: center;
        text-align: center;
        font-family: Quicksand, sans-serif;
        font-size: 16px;
        font-weight: 600;
    }
    
    .specials-container table {
        width: 90%;
        margin: 0px auto;
        table-layout: fixed;
        border-collapse: collapse;
    }
    
    #special_component {
        width: 100%;
        background-color: #fff;
        margin: 0 auto;
    }
    
    .specials-table-container {
        max-width: 1500px;
        margin: 40px auto;
    }
    
    h1 {
        font-family: "Damion", cursive;
        font-size: 50px;
        font-weight: 100;
        line-height: 25px;
    }
    
    .nameandprice td {
        padding: 1em 0 0 0;
        vertical-align: bottom;
        background-image: radial-gradient(black 1px, transparent 0px);
        background-size: 8px 8px;
        background-repeat: repeat-x;
        background-position: left bottom;
    }
    
    .nameandprice span {
        background-color: #fff;
    }
    
    .nameandprice td:first-child {
        text-align: left;
        font-weight: 700;
        font-size: 20px;
    }
    
    .nameandprice td:first-child span {
        padding-right: 0.25em;
    }
    
    .nameandprice td:last-child {
        text-align: right;
        width: 3em;
        font-size: 20px;
    }
    
    .description td {
        text-align: left;
        padding: 8px 0px 15px 15px;
    }
    
    td:last-child span {
        padding-left: 0.25em;
    }
    
    @media (min-width: 992px) {
        .specials-container table {
            margin: 40px;
          width: 45%;
        }
    
        .specials-table-container {
            display: flex;
            margin: 0px auto;
        }
    }
    
    @media only screen and (max-width: 500px) {
        .editlink {
            right: -20px;
            top: -15px;
        }
    }</style>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src=".\js\ayuda.js"></script>
    
</body>
</html>