<?php

namespace App\Permission;

use App\Models\User;

class PermissionCapabilities
{
    const ADMIN_ONLY = [
        User::ADMIN => true,
        User::MANAGER => false,
        User::COLLECTOR => false
    ];

    const NOT_COLLECTOR_ONLY = [
        User::ADMIN => true,
        User::MANAGER => true,
        User::COLLECTOR => false
    ];

    const ALL = [
        User::ADMIN => true,
        User::MANAGER => true,
        User::COLLECTOR => true
    ];

    const VIEW_DASHBOARD_LABEL = 'view_dashboard';
    const VIEW_DASHBOARD = self::ALL;

    const VIEW_USERS_LABEL = 'view_users';
    const VIEW_USERS = self::ADMIN_ONLY;

    const VIEW_USERS_COLLECTOR_LABEL = 'view_users_collector';
    const VIEW_USERS_COLLECTOR = self::NOT_COLLECTOR_ONLY;

    const VIEW_USER_DETAIL_LABEL = 'view_user_detail';
    const VIEW_USER_DETAIL = self::ALL;

    const CREATE_USERS_LABEL = 'create_users';
    const CREATE_USERS = self::ADMIN_ONLY;

    const UPDATE_USERS_LABEL = 'update_users';
    const UPDATE_USER = self::ALL;

    const VIEW_ACCOUNTS_LABEL = 'view_accounts';
    const VIEW_ACCOUNTS = self::NOT_COLLECTOR_ONLY;

    const VIEW_BILLERS_LABEL = 'view_billers';
    const VIEW_BILLERS = self::NOT_COLLECTOR_ONLY;

    const CREATE_BILLERS_LABEL = 'create_billers';
    const  CREATE_BILLERS = self::NOT_COLLECTOR_ONLY;

    const UPDATE_BILLERS_LABEL = 'update_billers';
    const UPDATE_BILLERS = self::NOT_COLLECTOR_ONLY;

    const VIEW_COLLECTIONS_LABEL = 'view_collections';
    const VIEW_COLLECTIONS = self::ALL;

    const CREATE_COLLECTIONS_LABEL = 'create_collections';
    const  CREATE_COLLECTIONS = self::ALL;

    const UPDATE_COLLECTIONS_LABEL = 'update_collections';
    const UPDATE_COLLECTIONS = self::ALL;

    const DELETE_COLLECTIONS_LABEL = 'delete_collections';
    const DELETE_COLLECTIONS = self::ALL;

    const VIEW_FEEDBACKS_LABEL = 'view_feedbacks';
    const VIEW_FEEDBACKS = self::NOT_COLLECTOR_ONLY;

    const CREATE_FEEDBACKS_LABEL = 'create_feedbacks';
    const CREATE_FEEDBACKS = self::ADMIN_ONLY;

    const VIEW_NOTIFICATIONS_LABEL = 'view_notifications';
    const VIEW_NOTIFICATIONS = self::ALL;

    const MARK_AS_READ_NOTIFICATIONS_LABEL = 'mark_as_read_notifications';
    const MARK_AS_READ_NOTIFICATIONS = self::ALL;

    const CREATE_REMITS_LABEL = 'create_remits';
    const CREATE_REMITS = self::NOT_COLLECTOR_ONLY;

    const VIEW_REMITS_LABEL = 'view_remits';
    const VIEW_REMITS = self::NOT_COLLECTOR_ONLY;

    const DOWNLOAD_REMITS_LABEL = 'download_remits';
    const DOWNLOAD_REMITS = self::NOT_COLLECTOR_ONLY;

    const VIEW_SETTING_LABEL = 'view_setting';
    const VIEW_SETIING = self::NOT_COLLECTOR_ONLY;

    const UPDATE_SETTING_LABEL = 'update_setting';
    const UPDATE_SETTING = self::NOT_COLLECTOR_ONLY;

    const VIEW_TRANSACTIONS_LABEL = 'view_transactions';
    const VIEW_TRANSACTIONS = self::NOT_COLLECTOR_ONLY;

    const CREATE_TRANSACTIONS_LABEL = 'create_transactions';
    const CREATE_TRANSACTIONS = self::ADMIN_ONLY;

    const CANCEL_TRANSACTION_LABEL = 'cancel_transactions';
    const CANCEL_TRANSACTION = self::ADMIN_ONLY;

    const VIEW_UNIT_CONFIG_LABEL = 'view_unit_config';
    const VIEW_UNIT_CONFIG = self::NOT_COLLECTOR_ONLY;

    const CREATE_UNIT_CONFIG_LABEL = 'create_unit_config';
    const CREATE_UNIT_CONFIG = self::NOT_COLLECTOR_ONLY;

    const DELETE_UNIT_CONFIG_LABEL = 'delete_unit_config';
    const DELETE_UNIT_CONFIG = self::NOT_COLLECTOR_ONLY;

    const VIEW_UNITS_LABEL = 'view_units';
    const VIEW_UNITS = self::ALL;

    const CREATE_UNITS_LABEL = 'create_units';
    const CREATE_UNITS = self::NOT_COLLECTOR_ONLY;

    const UPDATE_UNITS_LABEL = 'update_units';
    const UPDATE_UNITS = self::NOT_COLLECTOR_ONLY;

    const DELETE_UNITS_LABEL = 'delete_units';
    const DELETE_UNITS = self::NOT_COLLECTOR_ONLY;

    const CAPABILITIES = [
        self::VIEW_DASHBOARD_LABEL => self::VIEW_DASHBOARD,

        self::VIEW_USERS_LABEL => self::VIEW_USERS,
        self::VIEW_USER_DETAIL_LABEL => self::VIEW_USER_DETAIL,
        self::CREATE_USERS_LABEL => self::CREATE_USERS,
        self::UPDATE_USERS_LABEL => self::UPDATE_USER,
        self::VIEW_USERS_COLLECTOR_LABEL => self::VIEW_USERS_COLLECTOR,

        self::VIEW_ACCOUNTS_LABEL => self::VIEW_ACCOUNTS,

        self::VIEW_BILLERS_LABEL => self::VIEW_BILLERS,
        self::CREATE_BILLERS_LABEL => self::CREATE_BILLERS,
        self::UPDATE_BILLERS_LABEL => self::UPDATE_BILLERS,

        self::VIEW_COLLECTIONS_LABEL => self::VIEW_COLLECTIONS,
        self::CREATE_COLLECTIONS_LABEL => self::CREATE_COLLECTIONS,
        self::UPDATE_COLLECTIONS_LABEL => self::UPDATE_COLLECTIONS,
        self::DELETE_COLLECTIONS_LABEL => self::DELETE_COLLECTIONS,

        self::VIEW_FEEDBACKS_LABEL => self::VIEW_FEEDBACKS,
        self::CREATE_FEEDBACKS_LABEL => self::CREATE_FEEDBACKS,

        self::VIEW_NOTIFICATIONS_LABEL => self::VIEW_NOTIFICATIONS,
        self::MARK_AS_READ_NOTIFICATIONS_LABEL => self::MARK_AS_READ_NOTIFICATIONS,

        self::VIEW_REMITS_LABEL => self::VIEW_REMITS,
        self::CREATE_REMITS_LABEL => self::CREATE_REMITS,
        self::DOWNLOAD_REMITS_LABEL => self::DOWNLOAD_REMITS,

        self::VIEW_SETTING_LABEL => self::VIEW_SETIING,
        self::UPDATE_SETTING_LABEL => self::UPDATE_SETTING,

        self::VIEW_TRANSACTIONS_LABEL => self::VIEW_TRANSACTIONS,
        self::CREATE_TRANSACTIONS_LABEL => self::CREATE_TRANSACTIONS,
        self::CANCEL_TRANSACTION_LABEL => self::CANCEL_TRANSACTION,

        self::VIEW_UNIT_CONFIG_LABEL => self::VIEW_UNIT_CONFIG,
        self::CREATE_UNIT_CONFIG_LABEL => self::CREATE_UNIT_CONFIG,
        self::DELETE_UNIT_CONFIG_LABEL => self::DELETE_UNIT_CONFIG,

        self::VIEW_UNITS_LABEL => self::VIEW_UNITS,
        self::CREATE_UNITS_LABEL => self::CREATE_UNITS,
        self::UPDATE_UNITS_LABEL => self::UPDATE_UNITS,
        self::DELETE_UNITS_LABEL => self::DELETE_UNITS,
    ];
}
