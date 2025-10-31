/*
localStorage:   getItem() para obter dados.
                setItem()para adicionar ou atualizar.
                removeItem() para excluir dados armazenados do item expecifico.
                clearItem() para excluir/limpar todos os item.

Estrutura JSON para exemplo de um 1 item no carrinho:

{
    quartoID: 333,
    nome: "quartin",
    precoQuarto: 250.00,
    checkin: "2025-10-20",
    checkout: "2025-10-25",
    diaria: 5,
    subtotal: 1250.00,
}

Estrutura JSON para exemplo de um pedido:

{
status: "draft",
items:
    {
        quartoID: 333,
        nome: "quartin",
        precoQuarto: 250.00,
        checkin: "2025-10-20",
        checkout: "2025-10-25",
        diaria: 5,
        subtotal: 1250.00,
    },
    {
        quartoID: 334,
        nome: "quartin",
        precoQuarto: 250.00,
        checkin: "2025-10-20",
        checkout: "2025-10-25",
        diaria: 5,
        subtotal: 1250.00,
    }



}
*/

const key = "hotel_dart";

export function setCart(cart){
    localStorage.setItem(key, JSON.stringify(cart));  
}

export function getCart(){
    try {
        const raw = localStorage.getItems(key);
        return raw ? JSON.parse(raw) : {status: "draft", item: []};
    } catch {
        return {status: "draft", items: []};
    }
}

export function addItemToHotel_Cart(item){
    const cart = getCart();
    cart.items.push(item);
    setCart(hotel_cart);
    return hotel_cart;
}

export function removeItemFromHotel_Cart(i){
    const hotel_cart = getCart();
    hotel_cart.item.splice(i, 1);
    setCart(hotel_cart);
    return hotel_cart
}

export function clearHotel_Cart(){
    srtCArt({
        status: "draft",
        items: []
    });
}

export function getTotlaItems(){
    const {items} = getCart();
    const total = items.reduce((acc, it) =>acc + Number(it.subtotal || 0), 0);
    return total
}