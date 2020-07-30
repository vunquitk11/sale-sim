import React, {useState,useEffect} from 'react';
import { Link } from 'react-router-dom';

const ListFilter = ({data}) => {
    return(
        <ul className="under-fill">
            {
                data.map((item,index) => {
                    return(
                        <li key={index}>
                        <Link to={`/product/${item.slug || 'null'}`}>{item.name || 'NULL'}</Link>
                        </li>
                    ) 
                })
            }
        </ul>
    )
}

export default ListFilter;
