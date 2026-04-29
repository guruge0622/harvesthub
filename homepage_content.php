<?php
// Homepage content extracted from harvesthub_fragment.html
?>

<!-- HERO -->
<section id="home" class="hero" style="padding: 0;">
  <div style="padding: 60px 40px 60px; flex: 1;">
    <div class="hero-content">
      <div class="hero-badge">🌿 Farm Fresh Since 2024</div>
      <h1>Organic &<br><span>Natural</span><br>Choices</h1>
      <p>Connect directly with local farmers. Get the freshest fruits, vegetables, grains, and dairy products delivered straight from the farm to your table.</p>
      <div class="hero-btns">
        <button class="btn-primary" onclick="document.getElementById('products').scrollIntoView({behavior:'smooth'})">Shop Now</button>
        <button class="btn-secondary" onclick="document.getElementById('about').scrollIntoView({behavior:'smooth'})">Learn More</button>
      </div>
    </div>
  </div>
</section>

<!-- SUPER DEALS -->
<section class="deals-bg" id="deals">
  <div class="section-label">🔥 Limited Time</div>
  <div style="display:flex;justify-content:space-between;align-items:flex-end;margin-bottom:28px;">
    <h2 class="section-title" style="margin-bottom:0;">Super Deals</h2>
    <a href="#" style="color:var(--orange);font-weight:700;font-size:0.9rem;text-decoration:none;">View All →</a>
  </div>
  <div class="deals-scroll" id="dealsScroll"></div>
</section>

<!-- CATEGORIES -->
<section class="categories-bg" id="categories">
  <div class="section-header-center">
    <div class="section-label">Browse</div>
    <h2 class="section-title">Shop by Category</h2>
    <p class="section-sub">Discover farm-fresh products across all categories, sourced directly from trusted local farmers.</p>
  </div>
  <div class="cat-grid" id="catGrid"></div>
</section>

<!-- PRODUCTS -->
<section class="products-bg" id="products">
  <div class="section-header-center">
    <div class="section-label">Our Selection</div>
    <h2 class="section-title">Explore Our Products</h2>
    <p class="section-sub">Hand-picked produce from verified local farmers. 100% fresh, organic, and sustainably grown.</p>
  </div>
  <div class="tabs" id="productTabs"></div>
  <div class="products-grid" id="productGrid"></div>
</section>

<!-- LOYALTY -->
<section class="loyalty-bg">
  <div class="loyalty-inner">
    <div class="loyalty-icon">🌾</div>
    <div class="section-label" style="color:var(--orange-light);text-align:center;">Exclusive Benefits</div>
    <h2 class="section-title">Not a HarvestHub<br>Loyalty Member?</h2>
    <p>Join our loyalty program to unlock exclusive discounts, early access to seasonal produce, free delivery, and special farmer meet-and-greet events.</p>
    <button class="btn-loyalty" onclick="openModal('registerModal')">Join Now – It's Free</button>
    <div class="loyalty-perks">
      <div class="perk"><div class="perk-icon">💳</div><div class="perk-text">Points on<br>Every Order</div></div>
      <div class="perk"><div class="perk-icon">🚚</div><div class="perk-text">Free Delivery<br>Over $30</div></div>
      <div class="perk"><div class="perk-icon">🎁</div><div class="perk-text">Monthly<br>Rewards</div></div>
      <div class="perk"><div class="perk-icon">🌱</div><div class="perk-text">Farmer<br>Stories</div></div>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="about-bg" id="about">
  <div class="about-grid">
    <div class="about-img">
      <img src="https://images.unsplash.com/photo-1464226184884-fa280b87c399?w=700&q=80" alt="Farmer in field">
    </div>
    <div class="about-content">
      <div class="section-label">Our Story</div>
      <h2 class="section-title">About HarvestHub</h2>
      <p>HarvestHub was born from a simple idea: bridge the gap between hardworking local farmers and conscious consumers who want fresh, honest food.</p>
      <p>We cut out the middlemen so farmers earn more and you pay less — while getting produce that was picked within the last 24–48 hours. Every product on our platform is traceable back to a specific farm and farmer.</p>
      <p>Our platform supports sustainable agriculture, promotes local food systems, and helps small-scale farmers thrive in the modern economy.</p>
      <div class="about-stats">
        <div class="stat"><div class="stat-num">500+</div><div class="stat-label">Local Farmers</div></div>
        <div class="stat"><div class="stat-num">12K+</div><div class="stat-label">Happy Customers</div></div>
        <div class="stat"><div class="stat-num">300+</div><div class="stat-label">Products</div></div>
      </div>
      <button class="btn-primary">Meet Our Farmers</button>
    </div>
  </div>
</section>

<!-- CART SIDEBAR -->
<div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>
<div class="cart-sidebar" id="cartSidebar">
  <div class="cart-header">
    <h3>🛒 Your Cart</h3>
    <button class="cart-close" onclick="toggleCart()">✕</button>
  </div>
  <div class="cart-items" id="cartItems"></div>
  <div class="cart-footer" id="cartFooter"></div>
</div>

<!-- TOAST -->
<div class="toast" id="toast"></div>

<!-- MODALS (Login / Register) -->
<div id="loginModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:400;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:22px;padding:40px 36px;width:100%;max-width:400px;position:relative;">
    <button onclick="closeModal('loginModal')" style="position:absolute;top:14px;right:18px;background:none;border:none;font-size:1.4rem;cursor:pointer;color:#999;">✕</button>
    <h2 style="font-family:'Playfair Display',serif;color:var(--brown);margin-bottom:6px;">Welcome Back</h2>
    <p style="color:var(--muted);font-size:0.9rem;margin-bottom:26px;">Sign in to your HarvestHub account</p>
    <div style="margin-bottom:16px;"><label style="font-weight:700;font-size:0.85rem;color:var(--brown);display:block;margin-bottom:6px;">Email</label><input type="email" placeholder="you@example.com" style="width:100%;padding:11px 14px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.95rem;outline:none;"></div>
    <div style="margin-bottom:24px;"><label style="font-weight:700;font-size:0.85rem;color:var(--brown);display:block;margin-bottom:6px;">Password</label><input type="password" placeholder="••••••••" style="width:100%;padding:11px 14px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.95rem;outline:none;"></div>
    <button onclick="closeModal('loginModal')" style="width:100%;background:var(--green);color:#fff;padding:13px;border:none;border-radius:12px;font-family:'Nunito',sans-serif;font-weight:700;font-size:1rem;cursor:pointer;">Sign In</button>
    <p style="text-align:center;margin-top:16px;font-size:0.88rem;color:var(--muted);">No account? <a href="#" onclick="closeModal('loginModal');openModal('registerModal')" style="color:var(--green);font-weight:700;">Register</a></p>
  </div>
</div>
<div id="registerModal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.55);z-index:400;align-items:center;justify-content:center;">
  <div style="background:#fff;border-radius:22px;padding:40px 36px;width:100%;max-width:420px;position:relative;">
    <button onclick="closeModal('registerModal')" style="position:absolute;top:14px;right:18px;background:none;border:none;font-size:1.4rem;cursor:pointer;color:#999;">✕</button>
    <h2 style="font-family:'Playfair Display',serif;color:var(--brown);margin-bottom:6px;">Create Account</h2>
    <p style="color:var(--muted);font-size:0.9rem;margin-bottom:26px;">Join HarvestHub and shop farm fresh today</p>
    <div style="display:grid;grid-template-columns:1fr 1fr;gap:14px;margin-bottom:14px;">
      <div><label style="font-weight:700;font-size:0.83rem;color:var(--brown);display:block;margin-bottom:5px;">First Name</label><input placeholder="John" style="width:100%;padding:10px 12px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.92rem;outline:none;"></div>
      <div><label style="font-weight:700;font-size:0.83rem;color:var(--brown);display:block;margin-bottom:5px;">Last Name</label><input placeholder="Doe" style="width:100%;padding:10px 12px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.92rem;outline:none;"></div>
    </div>
    <div style="margin-bottom:14px;"><label style="font-weight:700;font-size:0.83rem;color:var(--brown);display:block;margin-bottom:5px;">Email</label><input type="email" placeholder="you@example.com" style="width:100%;padding:10px 12px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.92rem;outline:none;"></div>
    <div style="margin-bottom:20px;"><label style="font-weight:700;font-size:0.83rem;color:var(--brown);display:block;margin-bottom:5px;">Password</label><input type="password" placeholder="••••••••" style="width:100%;padding:10px 12px;border:2px solid #e8e0d5;border-radius:10px;font-family:'Nunito',sans-serif;font-size:0.92rem;outline:none;"></div>
    <button onclick="closeModal('registerModal')" style="width:100%;background:var(--orange);color:#fff;padding:13px;border:none;border-radius:12px;font-family:'Nunito',sans-serif;font-weight:700;font-size:1rem;cursor:pointer;">Create Account</button>
    <p style="text-align:center;margin-top:14px;font-size:0.88rem;color:var(--muted);">Already have an account? <a href="#" onclick="closeModal('registerModal');openModal('loginModal')" style="color:var(--green);font-weight:700;">Sign In</a></p>
  </div>
</div>

<script>
// Demo data and UI handlers (copied from fragment)
const deals = [
  { name: 'Organic Apples', tag: '30% OFF', price: '$2.99/kg', img: 'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400&q=70' },
  { name: 'Fresh Tomatoes', tag: '25% OFF', price: '$1.49/kg', img: 'https://images.unsplash.com/photo-1546094096-0df4bcaaa337?w=400&q=70' }
];
const categories = [
  { icon: '🍎', name: 'Fruits', count: '48 items' },
  { icon: '🥦', name: 'Vegetables', count: '62 items' }
];
const products = [
  { id:1, name:'Organic Red Apples', farmer:'Sunridge Farm', price:2.99, unit:'kg', img:'https://images.unsplash.com/photo-1560806887-1e4cd0b6cbd6?w=400&q=70', cat:'Fruits' },
  { id:2, name:'Fresh Broccoli', farmer:'Valley Greens', price:1.49, unit:'head', img:'https://images.unsplash.com/photo-1459411621453-7b03977f4bfc?w=400&q=70', cat:'Vegetables' }
];
const tabs = ['All','Fruits','Vegetables'];
let activeTab='All', cart=[];

const dealsCont=document.getElementById('dealsScroll'); if (dealsCont) deals.forEach(d=>{ dealsCont.innerHTML+=`<div class="deal-card"><img src="${d.img}" alt="${d.name}" loading="lazy"><div class="deal-overlay"><span class="deal-tag">${d.tag}</span><div class="deal-name">${d.name}</div><div class="deal-price">${d.price}</div></div></div>`; });
const catGrid=document.getElementById('catGrid'); if (catGrid) categories.forEach(c=>{ catGrid.innerHTML+=`<div class="cat-card" onclick="filterProducts('${c.name}')"><div class="cat-icon">${c.icon}</div><div class="cat-name">${c.name}</div><div class="cat-count">${c.count}</div></div>`; });
const tabsCont=document.getElementById('productTabs'); if (tabsCont) tabs.forEach(t=>{ tabsCont.innerHTML+=`<button class="tab ${t===activeTab?'active':''}" onclick="filterProducts('${t}')">${t}</button>`; });
function renderProducts(filter){ if(!document.getElementById('productGrid')) return; activeTab=filter; const filtered = filter==='All'?products:products.filter(p=>p.cat===filter); const grid=document.getElementById('productGrid'); grid.innerHTML=filtered.map(p=>`<div class="product-card"><img src="${p.img}" alt="${p.name}" loading="lazy"><button class="product-fav">♡</button><div class="product-body"><span class="product-badge">${p.cat}</span><div class="product-name">${p.name}</div><div class="product-farmer">by <span>${p.farmer}</span></div><div class="product-footer"><div class="product-price">$${p.price.toFixed(2)} <span class="unit">/ ${p.unit}</span></div><a href="cart.php?action=add&id=${p.id}" class="add-btn">+</a></div></div></div>`).join(''); document.querySelectorAll('.tab').forEach(tb=>tb.classList.toggle('active', tb.textContent===filter)); }
function filterProducts(cat){ const tabName = tabs.includes(cat)?cat:'All'; renderProducts(tabName); }
renderProducts('All');

function addToCart(id){ const p = products.find(x=>x.id===id); if(!p) return; const existing=cart.find(x=>x.id===id); if(existing) existing.qty++; else cart.push({...p,qty:1}); updateCartUI(); showToast(`✓ ${p.name} added to cart`); }
function updateCartUI(){ const badge=document.getElementById('cartBadge'); if(badge) badge.textContent=cart.reduce((s,x)=>s+x.qty,0); renderCart(); }
function renderCart(){ const cont=document.getElementById('cartItems'), foot=document.getElementById('cartFooter'); if(!cont){return;} if(!cart.length){ cont.innerHTML=`<div class="cart-empty"><div class="empty-icon">🛒</div><p>Your cart is empty</p></div>`; foot.innerHTML=''; return;} cont.innerHTML=cart.map(item=>`<div class="cart-item"><img src="${item.img}" alt="${item.name}"><div class="cart-item-info"><div class="cart-item-name">${item.name}</div><div class="cart-item-price">$${(item.price*item.qty).toFixed(2)}</div><div class="cart-item-qty"><button class="qty-btn" onclick="changeQty(${item.id},-1)">−</button><span class="qty-num">${item.qty}</span><button class="qty-btn" onclick="changeQty(${item.id},1)">+</button></div></div><button class="cart-remove" onclick="removeFromCart(${item.id})">✕</button></div>`).join(''); const subtotal=cart.reduce((s,x)=>s+x.price*x.qty,0); foot.innerHTML=`<div class="cart-total"><span>Subtotal</span><span>$${subtotal.toFixed(2)}</span></div><a href="checkout.php" class="btn-checkout">Proceed to Checkout</a>`; }
function changeQty(id,delta){ const item=cart.find(x=>x.id===id); if(!item) return; item.qty+=delta; if(item.qty<=0) cart=cart.filter(x=>x.id!==id); updateCartUI(); }
function removeFromCart(id){ cart=cart.filter(x=>x.id!==id); updateCartUI(); }
function toggleCart(){ const sb=document.getElementById('cartSidebar'), ov=document.getElementById('cartOverlay'); if(sb) sb.classList.toggle('open'); if(ov) ov.classList.toggle('open'); renderCart(); }
function showToast(msg){ const t=document.getElementById('toast'); if(!t) return; t.textContent=msg; t.classList.add('show'); setTimeout(()=>t.classList.remove('show'),2400); }
function openModal(id){ const m=document.getElementById(id); if(m) m.style.display='flex'; }
function closeModal(id){ const m=document.getElementById(id); if(m) m.style.display='none'; }
document.addEventListener('click', e=>{ if(e.target.classList.contains('product-fav')) e.target.textContent = e.target.textContent==='♡' ? '❤️' : '♡'; });
</script>
