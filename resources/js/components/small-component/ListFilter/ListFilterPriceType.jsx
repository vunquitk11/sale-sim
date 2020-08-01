import React, {useState,useEffect} from 'react';
import { Link } from 'react-router-dom';

const ListFilterPriceType = ({data}) => {
  console.log('DATA',data)
    return(
        <ul className="under-fill">
            {
                data.map((item,index) => {
                    return(
                        <li style={{maxWidth:'100%',}} key={index}>
                        <Link
                        style={{textAlign:'left',paddingLeft:'10px',}} 
                        to={`/product/${item.slug || 'null'}`}>{item.name || 'NULL'}</Link>
                        </li>
                    ) 
                })
            }
        </ul>
    )
}

export default ListFilterPriceType;
