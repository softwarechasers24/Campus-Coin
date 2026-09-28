<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatbotController extends Controller
{
    public function chat(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000',
        ]);

        $message = strtolower(trim($request->message));

        /*
        |--------------------------------------------------------------------------
        | WEBSITE PURPOSE
        |--------------------------------------------------------------------------
        */

        if (
            str_contains($message, 'purpose') ||
            str_contains($message, 'main purpose') ||
            str_contains($message, 'website purpose') ||
            str_contains($message, 'what is this website') ||
            str_contains($message, 'what does this website do') ||
            str_contains($message, 'website kya hai') ||
            str_contains($message, 'website ka purpose') ||
            str_contains($message, 'is website ka purpose') ||
            str_contains($message, 'ye website kis liye') ||
            str_contains($message, 'website kis liye hai')
        ) {
            $reply = 'Campus Coin is a student financial management website. Its main purpose is to help users manage their personal finances by recording income and expenses, organizing transactions into categories, creating budgets, tracking savings goals, and viewing financial reports and insights.';


        /*
        |--------------------------------------------------------------------------
        | MAIN FEATURES
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'main features') ||
            str_contains($message, 'major features') ||
            str_contains($message, 'key features') ||
            str_contains($message, 'features of this website') ||
            str_contains($message, 'website features') ||
            str_contains($message, 'what features') ||
            str_contains($message, 'what are the features') ||
            str_contains($message, 'main feature') ||
            str_contains($message, 'website ke features') ||
            str_contains($message, 'is website ke features') ||
            str_contains($message, 'features kya hain')
        ) {
            $reply = 'The main features of Campus Coin include Dashboard, Transactions, Income and Expense Tracking, Categories, Budget Management, Savings Goals, Reports, Financial Insights, Announcements, Profile Management and Settings. These features are designed to help students organize and manage their finances.';


        /*
        |--------------------------------------------------------------------------
        | WHAT IS CAMPUS COIN
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'what is campus coin') ||
            str_contains($message, 'campus coin kya hai') ||
            $message === 'campus coin'
        ) {
            $reply = 'Campus Coin is a student financial management platform designed to help students organize their money. It provides tools for tracking transactions, managing budgets, setting savings goals and understanding financial activity.';


        /*
        |--------------------------------------------------------------------------
        | WHO IS IT FOR
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'who is this website for') ||
            str_contains($message, 'who can use') ||
            str_contains($message, 'who is campus coin for') ||
            str_contains($message, 'kis ke liye') ||
            str_contains($message, 'kon use kar sakta')
        ) {
            $reply = 'Campus Coin is designed especially for students who want a simple way to organize their income, expenses, budgets and savings goals.';


        /*
        |--------------------------------------------------------------------------
        | WHY USE CAMPUS COIN
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'why use') ||
            str_contains($message, 'why should i use') ||
            str_contains($message, 'benefit') ||
            str_contains($message, 'benefits') ||
            str_contains($message, 'faida') ||
            str_contains($message, 'faide')
        ) {
            $reply = 'Campus Coin can help students keep their financial information organized in one place. It provides tools for tracking spending, planning budgets, setting savings targets and reviewing financial information.';


        /*
        |--------------------------------------------------------------------------
        | GREETING
        |--------------------------------------------------------------------------
        */

        } elseif (
            $message === 'hi' ||
            $message === 'hello' ||
            $message === 'hey' ||
            $message === 'salam' ||
            $message === 'assalam o alaikum' ||
            $message === 'assalamualaikum'
        ) {
            $reply = 'Hello! 👋 Welcome to Campus Coin. How can I help you today?';


        /*
        |--------------------------------------------------------------------------
        | DASHBOARD
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'dashboard') ||
            str_contains($message, 'dashboard ka')
        ) {
            $reply = 'The Dashboard gives you an overview of your financial information. It helps you quickly see important information about your transactions, budget and financial activity.';


        /*
        |--------------------------------------------------------------------------
        | TRANSACTIONS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'transaction') ||
            str_contains($message, 'transactions')
        ) {
            $reply = 'The Transactions feature lets you record and manage your financial transactions, including income and expenses. It helps you keep a record of where your money comes from and where it goes.';


        /*
        |--------------------------------------------------------------------------
        | INCOME
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'income') ||
            str_contains($message, 'earning') ||
            str_contains($message, 'earnings')
        ) {
            $reply = 'The Income feature helps you keep track of money that you receive or earn.';


        /*
        |--------------------------------------------------------------------------
        | EXPENSES
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'expense') ||
            str_contains($message, 'expenses') ||
            str_contains($message, 'spending')
        ) {
            $reply = 'The Expenses feature helps you record and monitor the money you spend, making it easier to understand your spending habits.';


        /*
        |--------------------------------------------------------------------------
        | CATEGORIES
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'category') ||
            str_contains($message, 'categories')
        ) {
            $reply = 'Categories help you organize transactions into meaningful groups. This makes it easier to understand and manage different types of income and expenses.';


        /*
        |--------------------------------------------------------------------------
        | BUDGET
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'budget') ||
            str_contains($message, 'budgets')
        ) {
            $reply = 'The Budget feature helps you plan your spending by setting financial limits and monitoring your budget.';


        /*
        |--------------------------------------------------------------------------
        | SAVINGS GOALS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'savings goal') ||
            str_contains($message, 'saving goal') ||
            str_contains($message, 'savings goals') ||
            str_contains($message, 'saving goals') ||
            str_contains($message, 'savings') ||
            str_contains($message, 'bachat')
        ) {
            $reply = 'Savings Goals help you set a target amount that you want to save for a specific purpose. You can use this feature to plan your savings and track your progress toward your goal.';


        /*
        |--------------------------------------------------------------------------
        | REPORTS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'report') ||
            str_contains($message, 'reports')
        ) {
            $reply = 'Reports help you review and understand your financial activity by presenting information about your income, expenses and transactions.';


        /*
        |--------------------------------------------------------------------------
        | INSIGHTS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'insight') ||
            str_contains($message, 'insights')
        ) {
            $reply = 'Insights provide useful information about your financial activity and can help you understand your spending and financial patterns.';


        /*
        |--------------------------------------------------------------------------
        | ANNOUNCEMENTS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'announcement') ||
            str_contains($message, 'announcements')
        ) {
            $reply = 'Announcements are used to show important updates, notices and information related to Campus Coin.';


        /*
        |--------------------------------------------------------------------------
        | PROFILE
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'profile') ||
            str_contains($message, 'account')
        ) {
            $reply = 'The Profile section allows you to manage your account information.';


        /*
        |--------------------------------------------------------------------------
        | SETTINGS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'setting') ||
            str_contains($message, 'settings')
        ) {
            $reply = 'Settings allow you to manage your profile, general preferences, notifications and password.';


        /*
        |--------------------------------------------------------------------------
        | PASSWORD
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'password') ||
            str_contains($message, 'change password')
        ) {
            $reply = 'You can change your password from the Settings section.';


        /*
        |--------------------------------------------------------------------------
        | LOGIN
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'login') ||
            str_contains($message, 'log in')
        ) {
            $reply = 'The Login page allows registered users to access their Campus Coin account.';


        /*
        |--------------------------------------------------------------------------
        | REGISTER
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'register') ||
            str_contains($message, 'registration') ||
            str_contains($message, 'signup') ||
            str_contains($message, 'sign up')
        ) {
            $reply = 'The Register page allows a new user to create a Campus Coin account.';


        /*
        |--------------------------------------------------------------------------
        | HELP
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'help') ||
            str_contains($message, 'madad')
        ) {
            $reply = 'I can answer questions about Campus Coin and its features, including Dashboard, Transactions, Income, Expenses, Categories, Budget, Savings Goals, Reports, Insights, Announcements, Profile and Settings.';


        /*
        |--------------------------------------------------------------------------
        | THANKS
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'thank') ||
            str_contains($message, 'thanks') ||
            str_contains($message, 'shukriya')
        ) {
            $reply = 'You are welcome! 😊 I am happy to help.';


        /*
        |--------------------------------------------------------------------------
        | GOODBYE
        |--------------------------------------------------------------------------
        */

        } elseif (
            str_contains($message, 'bye') ||
            str_contains($message, 'goodbye')
        ) {
            $reply = 'Goodbye! 👋 Have a great day!';


        /*
        |--------------------------------------------------------------------------
        | DEFAULT
        |--------------------------------------------------------------------------
        */

        } else {
            $reply = 'I can help you with Campus Coin. You can ask me about the website purpose, main features, Dashboard, Transactions, Income, Expenses, Categories, Budget, Savings Goals, Reports, Insights, Announcements, Profile or Settings.';
        }


        return response()->json([
            'success' => true,
            'reply' => $reply,
        ]);
    }


    public function history()
    {
        return response()->json([]);
    }
}