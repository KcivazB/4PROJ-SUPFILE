<?php
namespace App\Enum;

enum NodeType: string
{
    case FILE = 'file';
    case FOLDER = 'folder';
}
