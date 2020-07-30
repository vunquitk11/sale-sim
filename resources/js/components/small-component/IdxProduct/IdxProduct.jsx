import React, { Component } from 'react';

const IdxProduct = ({data}) => {
    console.log(data);
    return(
        <ul className="under-product">
            {
                data.map((item,index) => {
                    return(
                        <li key={index} className="list_sim_item_V">
                            <img className="brand_image_V" src={item.brand_image || 'NULL'}/>
                            <div>
                                <p>{item.phone || 'NULL'}</p>
                                <p>{item.price} VND</p>
                            </div>
                        </li> 
                    ) 
                })
            }
        </ul>
    )
}

export default IdxProduct;