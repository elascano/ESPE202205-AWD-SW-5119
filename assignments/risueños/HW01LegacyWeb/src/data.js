import {supabase} from './supabaseClient'

export async function updateCart(){
    try{
        let { data, error } = await supabase
        .rpc('fn_put_name')
    
        if (error) console.error(error)
        else console.log(data)
    }catch(e){
        console.log(e)
    }
    
}

export async function getCartItems(userEmail, setStateFunction){
    try{
        let { data: shopping_cart, error } = await supabase
        .from('shopping_cart')
        .select('*')
        .eq('email', userEmail)
        
        if(error){console.log(error)}

        if(shopping_cart){
            setStateFunction(shopping_cart)
        }

    }catch(e){
        console.log(e)
    }
}

export async function deleteCartItem(transaction){
    try{
        const { data, error } = await supabase
        .from('shopping_cart')
        .delete()
        .eq('id_transaction', transaction)

        if(error){console.log(error)}

    }catch(e){
        console.log(e)
    }
}

export async function insertToCart(productID, email, size, price, quantity){
    try{
        const { data, error } = await supabase
        .from('shopping_cart')
        .insert(
            {
                id_product: productID,
                email: email,
                size: size,
                price: price,
                quantity: quantity
            }
        )

        if (error){console.log(error)}
    }catch(e){
        console.log(e)
    }finally{
        await updateCart()
    }
}

export async function getProducts(category, stateSetFunction){
    try{
        
        if(category === ""){
            let { data: products, error } = await supabase
            .from('products')
            .select("*")

            if(error){
                console.log(error)
            }
    
            if(products){
               stateSetFunction(products)
            }

        }else{
            let { data: products, error } = await supabase
            .from('products')
            .select("*")
            .eq('category', category)

            if(error){
                console.log(error)
            }
    
            if(products){
               stateSetFunction(products)
            }
        }

       
    }catch(e){
        console.log(e)
    }
}

export async function getCategoriesList(setStateFunction){
    try{
        let { data: categories, error } = await supabase
        .from('categories')
        .select('*')

        if(error){
            console.log(error)
        }
        
        if(categories){
           setStateFunction(categories)
        }
       
    }catch(e){
        console.log(e)
    }
}



export const sliderItems =[
    {
        id: 'C-1',
        img: "https://i.ibb.co/yQ65nty/persona1.png",
        title: "DESBLOQUEA TU POTENCIAL",
        desc:  "SE EL MEJOR TENIENDO LO MEJOR! OBTEN UN 30% DE DESCUENTO EN TU PRIMERA COMPRA.",
        bg: "e1e1e1",
    },
    {
        id: 'C-2',
        img: "https://i.ibb.co/SBf6Z3V/persona2.png",
        title: "DESBLOQUEA TU ESTILO",
        desc:  "SE EL MEJOR TENIENDO LO MEJOR! OBTEN UN 30% DE DESCUENTO EN TU PRIMERA COMPRA.",
        bg: "f6cdd1",
    },
    {
        id: 'C-3',
        img: "https://i.ibb.co/Pr1JPCF/persona3.png",
        title: "DESBLOQUEA TU NUEVO TU",
        desc:  "SE EL MEJOR TENIENDO LO MEJOR! OBTEN UN 30% DE DESCUENTO EN TU PRIMERA COMPRA.",
        bg: "e1e1e1",
    }

];

export var shoppingCartItems = [
 
];
