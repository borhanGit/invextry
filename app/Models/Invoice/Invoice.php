<?php

namespace App\Models\Invoice;

use App\Models\Party;
use App\Models\Setting\Warehouse;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    public function invoiceItems()
    {
        return $this->hasMany(InvoiceItem::class);
    }

    public function party()
    {   
        return $this->belongsTo(Party::class, 'party_id');
    }

    public function warehouse()
    {   
        return $this->belongsTo(Warehouse::class, 'warehouse_id');
    }

    public function creator()
    {   
        return $this->belongsTo(User::class, 'created_by');
    }
}
